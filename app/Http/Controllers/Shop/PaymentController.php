<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopOrderRepository;
use Illuminate\Http\Request;

class PaymentController extends GuestBaseController
{

    /**
     * Отправка формы платежа на сайт webmoney
     *
     * @param $id
     * @return \View
     *
     */
    public function webmoney($id)
    {
        return view('Shop.payment', compact('id'));
    }


    /**
     * Обработка формы предварительного запроса webmoney
     *
     * @param Request $request
     * @param ShopOrderRepository $orders
     * @return string
     */
    public function result(Request $request, ShopOrderRepository $orders)
    {
        $secret = 'F1B16FE1-41EC-4DE4-91D9-CBC86F377B1A';

        $purse = 'Z325841803979';

        $order = $request->input();

        $savedOrder = $orders->getEdit($order['LMI_PAYMENT_NO']);

        if (empty($savedOrder)) {
            exit('Заказ не найден');
        }


        if (isset($order['LMI_PREREQUEST']) && $order['LMI_PREREQUEST'] == 1) {

            // Обработка формы предварительного запроса
            if ($order['LMI_PAYMENT_NO'] == $savedOrder->id
                && $order['LMI_PAYEE_PURSE'] == $purse
                && $order['LMI_PAYMENT_AMOUNT'] == $savedOrder->price) {
                exit('YES');
            }

        } else {

            // Обработка формы оповещения о платеже
            $price = number_format((float)$savedOrder->price, 2, '.', '');

            $str_hash = $purse . $price . $savedOrder->id . $order['LMI_MODE'] . $order['LMI_SYS_INVS_NO']
                . $order['LMI_SYS_TRANS_NO'] . $order['LMI_SYS_TRANS_DATE'] . $secret . $order['LMI_PAYER_PURSE']
                . $order['LMI_PAYER_WM'];

            $sha = mb_strtoupper(hash('sha256', $str_hash));

            // Если платеж прошел проверку - отмечаем оплату заказа
            if ($sha == $order['LMI_HASH']) {

                $savedOrder->is_paid = true;

                $savedOrder->comment .= ' ' . $order['LMI_PAYER_PURSE'] . ' | ' . $order['LMI_SYS_TRANS_DATE'];

                $savedOrder->save();
            } else {
                $savedOrder->comment .= ' !Не совпали данные оплаты!';

                $savedOrder->save();
            }
        }
    }
}
