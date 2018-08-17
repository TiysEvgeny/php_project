class Good
{
    constructor(id, title, price)
    {
        this.id = id;
        this.title = title;
        this.price = price;
    }

    render($jqueryElement)
    {
        let $goodContainer = $('<div/>', {
            class: 'good'
        });

        let $goodTitle = $('<p/>', {
            text: this.title
        });

        let $goodPrice = $(`<p>Цена: <span class="product-price">${this.price}</span> руб.</p>`);

        let $goodBtn = $('<button/>', {
            class: 'buygood',
            text: 'Купить',
            'data-id': this.id
        });

        let $removeBtn = $('<button/>', {
            class: 'removeGood',
            text: 'Удалить',
            'data-id': this.id,
            'data-title': this.title
        });

        //Создаем структуру товара
        $goodTitle.appendTo($goodContainer);
        $goodPrice.appendTo($goodContainer);
        $goodBtn.appendTo($goodContainer);
        $removeBtn.appendTo($goodContainer);
        $jqueryElement.append($goodContainer);
    }
}