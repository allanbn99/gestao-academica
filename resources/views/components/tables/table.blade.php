<table class="table" id="{{ $params['id'] }}">
    <thead>
        <tr>
            @foreach ($thead as $th)
                <th scope="col">{{ $th }}</th>
            @endforeach
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<nav class="d-flex justify-content-end">
    <ul class="pagination" id="{{ $params['id'] }}">
    </ul>
</nav>

@push('script')
<script>
var tableData = JSON.parse(`{{ $tbody }}`.replace(/&quot;/g,'"'))
var tableHtmlId = `table#{{ $params['id'] }}`
var paginationHtmlId = `nav ul#{{ $params['id'] }}`

var state = {
    'querySet': tableData,

    'page': 1,
    'pages': 1,
    'rows': 10,
    'window': 5,
}

buildTable()

function pagination(querySet, page, rows) {

    var trimStart = (page - 1) * rows
    var trimEnd = trimStart + rows

    var trimmedData = querySet.slice(trimStart, trimEnd)

    var pages = Math.ceil(querySet.length / rows);

    state.pages = pages

    return {
        'querySet': trimmedData,
        'pages': pages,
    }
}

function pageButtons(pages) {
    //var wrapper = document.getElementById('pagination-wrapper')

    //wrapper.innerHTML = ``

    $(paginationHtmlId).html(``)

    var maxLeft = (state.page - Math.floor(state.window / 2))
    var maxRight = (state.page + Math.floor(state.window / 2))

    if (maxLeft < 1) {
        maxLeft = 1
        maxRight = state.window
    }

    if (maxRight > pages) {
        maxLeft = pages - (state.window - 1)

        if (maxLeft < 1){
        	maxLeft = 1
        }
        maxRight = pages
    }

    for (var page = maxLeft; page <= maxRight; page++) {
    	//wrapper.innerHTML += `<li class="page-item"><button type="button" value=${page} class="page page-link">${page}</button></li>`
        $(paginationHtmlId).append(`<li class="page-item"><button type="button" value=${page} class="page page-link">${page}</button></li>`);
    }

    if (state.page != 1) {
        //wrapper.innerHTML = `<li class="page-item"><button type="button" value=${1} class="page page-link">&#171;</button>` + wrapper.innerHTML + `</li>`
        var wrapper = $(paginationHtmlId).html()
        console.log(wrapper)
        $(paginationHtmlId).append(`<li class="page-item"><button type="button" value=${1} class="page page-link">&#171;</button>${wrapper}</li>`)
    }

    if (state.page != pages) {
        //wrapper.innerHTML += `<li class="page-item"><button type="button" value=${pages} class="page page-link">&#187;</button></li>`
        $(paginationHtmlId).append(`<li class="page-item"><button type="button" value=${pages} class="page page-link">&#187;</button></li>`)
    }

    $('.page').on('click', function() {
        $(`${tableHtmlId} tbody`).empty()

        state.page = Number($(this).val())

        buildTable()
    })

    $(`.page[value="${state.page}"]`).parent().addClass('active')
}

function buildTable() {
    var table = $(`${tableHtmlId} tbody`).html(``)

    var data = pagination(state.querySet, state.page, state.rows)
    var myList = data.querySet

    for (var i = 0 in myList) {
        var obj = myList[i];
        var row = `<tr data-table="${myList[i].id}">`

        for (var key in obj) {
            row += `<td>${obj[key]}</td>`
        }

        row += `<td><button type="button" class="btnRemover">Remover</button></td>`

        table.append(row)
    }

    $(`${tableHtmlId} .btnRemover`).click(function() {
        id = $(this).parent().parent().data('table')

        state.querySet = state.querySet.filter(function(value) {
            return value.id !== id
        })

        if (state.querySet.length % state.rows === 0) {
            if (state.page !== 1 && state.page === state.pages) {
                state.page--
            }
        }

        buildTable()
    })

    pageButtons(data.pages)
}

</script>
@endpush
