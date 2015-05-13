/* global variables */
var baseUrl = '';

/* JQuery document ready */
$(document).ready(function () {

    initialize();
    changeSorting();

});


/* initialize */
function initialize() {
    baseUrl = $('#base-url-1').val();
}


function changeSorting()
{
    $(document).on('change', '#sortResults', function () {
        callShopPages(1);
    });
}


/**
 * call shop pages
 * @param page
 */
function callShopPages(page) {
    var sortResults = $('#sortResults').val();
    var installedShops = $('#installedShops').val();
    var unInstalledShops = $('#unInstalledShops').val();

    //console.log('clickOnProductPages for page = ' + page + ' and textFilter = ' + textFilter + ', productFilter = ' + productFilter + ', vendorFilter = ' + vendorFilter + ', productsPerPage = ' + productsPerPage);

    var myData = {
        page: page,
        sortResults: sortResults,
        installedShops: installedShops,
        unInstalledShops: unInstalledShops
    };

    // AJAX call
    $.ajax({
        url: baseUrl + '/shopPage',
        type: 'POST',
        data: myData,
        success: function (resultData) {
            //console.log("AJAX 1 - clickOnProductPages: resultData = " + resultData);
            var resultObject = JSON.parse(resultData);
            var productList = resultObject['productList'];
            var totalPages = resultObject['totalPages'];
            var productLinks = buildPageLinks(Number(page), Number(totalPages), baseUrl + '/newOrder?shopURL=' + shopURL);

            var products = "";
            var length = productList.length;
            //console.log("AJAX 2 - clickOnProductPages: length = " + length);

            // loop over products
            for (i = 0; i < length; i++) {
                var pro = productList[i];
                products += "<tr>";
                products += "<td>" + pro['image'] + "</td>";
                products += "<td><a href='" + pro['product_id'] + "' pid='" + pro['product_id'] + "'>" + pro['title'] + "</a></td>";
                products += "<td>" + pro['inventory'] + "</td>";
                products += "<td>" + pro['product_type'] + "</td>";
                products += "<td>" + pro['vendor'] + "</td>";
                products += "<td>" + pro['price'] + "</td>";
                products += "</tr>";
            }

            $('#searchableProduct1').html(products);
            $('#productLinks').html(productLinks);
            shopifyAppBarLoadingOff();
        }
    });
}


/**
 * Build the pagination links
 * @param currentPage
 * @param totalPages
 * @param url
 * @returns {string}
 */
function buildPageLinks(currentPage, totalPages, url) {
    //console.log("buildPageLinks 1: currentPage="+currentPage+", totalPages="+totalPages+", url="+url);
    var links = "<ul class='pagination'>";
    //first page
    if (currentPage == 1) {
        links += "<li class='disabled'><span>&laquo;</span></li>";
        links += "<li class='active'><span>1</span></li>";
    } else {
        links += "<li><a href='" + url + "&page=1' rel='next'>&laquo;</a></li>";
        links += "<li><a href='" + url + "&page=1'>1</a></li>";
    }
    // pages < current page
    for (i = 2; i < currentPage; i++) {
        links += "<li><a href='" + url + "&page=" + i + "'>" + i + "</a></li>";
    }
    // active page
    if (currentPage > 1) {
        links += "<li class='active'><span>" + currentPage + "</span></li>";
    }
    // last page
    if (currentPage < totalPages) {
        links += "<li><a href='" + url + "&page=" + (currentPage + 1) + "'>" + (currentPage + 1) + "</a></li>";
        links += "<li><a href='" + url + "&page=" + (currentPage + 1) + "'>&raquo;</a></li>";
    } else {
        links += "<li class='disabled'><span>&raquo;</span></li>";
    }
    links += "</ul>";

    //console.log("buildPageLinks: links = " + links);
    return links;
}


