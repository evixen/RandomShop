const client = algoliasearch("LYS5BKVZX6", "590652392b6f4a0c40303436d470b197");
const products = client.initIndex('shop_products');

autocomplete('#aa-search-input', {}, [
    {
        source: autocomplete.sources.hits(products, {hitsPerPage: 10}),
        displayKey: 'name',
        templates: {
            suggestion: function(suggestion) {
                const markup = `
                    <span>${suggestion.name}</span><span>${suggestion.price}</span>
                `;

                return markup;
            },
            empty: function () {
                return `<span>Ничего не найдено</span>`;
            }
        }
    }
]).on('autocomplete:selected', function (event, suggestion, dataset) {
    window.location.href = window.location.origin + '/products/' + suggestion.slug;
});
