/* global variables */
var baseUrl = '';

/* JQuery document ready */
$(document).ready(function () {

    initialize();
    ajaxSetup();
    changeSorting();
    changeInstallCheckbox();
    changeUninstallCheckbox();

});


/* initialize */
function initialize() {
    baseUrl = $('#base-url-1').val();
}

function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}


function changeSorting()
{
    $(document).on('change', '#sortResults', function () {
        callShopPages(1);
    });
}

function changeInstallCheckbox()
{
    $(document).on('change', '#installedShops', function () {
        callShopPages(1);
    });
}

function changeUninstallCheckbox()
{
    $(document).on('change', '#unInstalledShops', function () {
        callShopPages(1);
    });
}

/**
 * call shop pages
 * @param page
 */
function callShopPages(page) {
    var sortResults = $('#sortResults').val();
    var installedShops = $('#installedShops').is(':checked');
    var unInstalledShops = $('#unInstalledShops').is(':checked');

    console.log('callShopPages for page = ' + page + ' and sortResults = ' + sortResults + ', installedShops = ' + installedShops + ', unInstalledShops = ' + unInstalledShops);

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
            var allShops = resultObject['allShops'];
            var totalPages = resultObject['totalPages'];
            var shopLinks = buildPageLinks(Number(page), Number(totalPages), baseUrl + '/');

            var shops = "";
            var length = allShops.length;
            //console.log("AJAX 2 - clickOnProductPages: length = " + length);

            // loop over products
            for (i = 0; i < length; i++) {
                var shop = allShops[i];
                shops += "<tr>";
                shops += "<td>" + shop['id'] + "</td>";
                shops += "<td>" + shop['shop'] +" - "+ shop['email'] + "</td>";
                shops += "<td>" + shop['country'] +" - "+ shop['province'] +" - "+ shop['city'] + "</td>";
                shops += "<td>" + shop['count_api_order'] + "</td>";
                shops += "<td>" + shop['count_email_order'] + "</td>";
                shops += "<td>" + shop['count_storefront_order'] + "</td>";
                shops += "<td>" + shop['last_active'] + "</td>";
                shops += "<td>" + shop['installed'] + "</td>";
                shops += "<td>" + shop['install_date'] + "</td>";
                shops += "</tr>";
            }

            $('#shopDetails').html(shops);
            $('#productLinks').html(shopLinks);
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


