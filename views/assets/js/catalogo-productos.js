$(document).ready(function() {
    const cardLeche = document.getElementById('cards-leches');
    const cardYogurt = document.getElementById('cards-yogurt');
    const cardQueso = document.getElementById('cards-quesos');
    const templateProduct = document.getElementById('products-template').content;
    const fragmentLeche = document.createDocumentFragment();
    const fragmentYogurt = document.createDocumentFragment();
    const fragmentQueso = document.createDocumentFragment();
    $.ajax({
        type: "POST",
        url: "ajax/productos.php",
        data: {
            "getProductosAll": ""
        },
        success: function(response) {
            let jsoParse = JSON.parse(response);
            let leches = jsoParse.filter(element => element.categoria == "Leche Cruda");
            let yogures = jsoParse.filter(element => element.categoria == "Yogurt");
            let quesos = jsoParse.filter(element => element.categoria == "Quesos");
            leches.forEach(element => {
                templateProduct.querySelector('.card-title').textContent = element.nombre;
                templateProduct.querySelector('.card-subtitle').textContent = element.descripcion;
                templateProduct.querySelector('.d_mayor').textContent = element.d_precio_mayorista + " : ";
                templateProduct.querySelector('.price-mayor').textContent = '$ ' + element.precio_mayorista;
                if (element.d_precio_minorista == '') {
                    templateProduct.querySelector('.d_menor').textContent = "Al por menor" + " : ";
                    templateProduct.querySelector('.price-menor').textContent = '$ ' + element.precio_publico;
                } else {
                    templateProduct.querySelector('.d_menor').textContent = element.d_precio_minorista + " : ";
                    templateProduct.querySelector('.price-menor').textContent = '$ ' + element.precio_minorista;
                }
                templateProduct.querySelector('.d_publico').textContent = "Precio normal: ";
                templateProduct.querySelector('.price-publico').textContent = '$ ' + element.precio_publico;
                templateProduct.querySelector('.btnAddCart').setAttribute('onclick', `addCart(${element.codigo},'${element.nombre} - ${element.descripcion}',${element.precio_mayorista}, '${element.d_precio_mayorista}',${element.precio_minorista},'${element.d_precio_minorista}','${element.precio_publico}')`);
                const clone = templateProduct.cloneNode(true);
                fragmentLeche.appendChild(clone);
            });
            cardLeche.appendChild(fragmentLeche);

            yogures.forEach(element => {
                templateProduct.querySelector('.card-title').textContent = element.nombre;
                templateProduct.querySelector('.card-subtitle').textContent = element.descripcion;
                templateProduct.querySelector('.d_mayor').textContent = element.d_precio_mayorista + " : ";
                templateProduct.querySelector('.price-mayor').textContent = '$ ' + element.precio_mayorista;
                if (element.d_precio_minorista == '') {
                    templateProduct.querySelector('.d_menor').textContent = "Al por menor" + " : ";
                    templateProduct.querySelector('.price-menor').textContent = '$ ' + element.precio_publico;
                } else {
                    templateProduct.querySelector('.d_menor').textContent = element.d_precio_minorista;
                    templateProduct.querySelector('.price-menor').textContent = '$ ' + element.precio_minorista;
                }
                templateProduct.querySelector('.d_publico').textContent = "Precio normal: ";
                templateProduct.querySelector('.price-publico').textContent = '$ ' + element.precio_publico;
                const clone = templateProduct.cloneNode(true);

                fragmentYogurt.appendChild(clone);
            });
            cardYogurt.appendChild(fragmentYogurt);

            quesos.forEach(element => {
                templateProduct.querySelector('.card-title').textContent = element.nombre;
                templateProduct.querySelector('.card-subtitle').textContent = element.descripcion;
                templateProduct.querySelector('.d_mayor').textContent = element.d_precio_mayorista + " : ";
                templateProduct.querySelector('.price-mayor').textContent = '$ ' + element.precio_mayorista;
                if (element.d_precio_minorista == '') {
                    templateProduct.querySelector('.d_menor').textContent = "Al por menor" + " : ";
                    templateProduct.querySelector('.price-menor').textContent = '$ ' + element.precio_publico;
                } else {
                    templateProduct.querySelector('.d_menor').textContent = element.d_precio_minorista;
                    templateProduct.querySelector('.price-menor').textContent = '$ ' + element.precio_minorista;
                }
                templateProduct.querySelector('.d_publico').textContent = "Precio normal: ";
                templateProduct.querySelector('.price-publico').textContent = '$ ' + element.precio_publico;

                const clone = templateProduct.cloneNode(true);

                fragmentQueso.appendChild(clone);
            });
            cardQueso.appendChild(fragmentQueso);
            // jsoParse.forEach(element => {
            //     templateProduct.querySelector('.card-title').textContent = element.nombre;
            //    const clone = templateProduct.cloneNode(true);

            //    fragment.appendChild(clone);
            // });
            // cardLeche.appendChild(fragment);
        }


    })
})