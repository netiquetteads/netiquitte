$(document).ready(function() {
    window._token = $('meta[name="csrf-token"]').attr('content')

    moment.updateLocale('en', {
        week: { dow: 1 } // Monday is the first day of the week
    })

    $('.date').datetimepicker({
        format: 'MM/DD/YYYY',
        locale: 'en',
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        }
    })

    $('.datetime').datetimepicker({
        format: 'MM/DD/YYYY HH:mm:ss',
        locale: 'en',
        sideBySide: true,
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        }
    })

    $('.timepicker').datetimepicker({
        format: 'HH:mm:ss',
        icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
        }
    })

    $('.select-all').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', 'selected')
        $select2.trigger('change')
    })
    $('.deselect-all').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', '')
        $select2.trigger('change')
    })

    $('.select-all-access').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        let options = $select2.find('option');
        for (let i = 0; i < options.length; i++) {
            var text = options[i].text;
            if (text.search("access") != -1) {
                $select2.find("option:contains('" + text + "')").prop('selected', 'selected')
                $select2.trigger('change')
            }
        }
    })
    $('.select-all-create').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        let options = $select2.find('option');
        for (let i = 0; i < options.length; i++) {
            var text = options[i].text;
            if (text.search("create") != -1) {
                $select2.find("option:contains('" + text + "')").prop('selected', 'selected')
                $select2.trigger('change')
            }
        }
    })
    $('.select-all-edit').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        let options = $select2.find('option');
        for (let i = 0; i < options.length; i++) {
            var text = options[i].text;
            if (text.search("edit") != -1) {
                $select2.find("option:contains('" + text + "')").prop('selected', 'selected')
                $select2.trigger('change')
            }
        }
    })
    $('.select-all-show').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        let options = $select2.find('option');
        for (let i = 0; i < options.length; i++) {
            var text = options[i].text;
            if (text.search("show") != -1) {
                $select2.find("option:contains('" + text + "')").prop('selected', 'selected')
                $select2.trigger('change')
            }
        }
    })
    $('.select-all-delete').click(function() {
        let $select2 = $(this).parent().siblings('.select2')
        let options = $select2.find('option');
        for (let i = 0; i < options.length; i++) {
            var text = options[i].text;
            if (text.search("delete") != -1) {
                $select2.find("option:contains('" + text + "')").prop('selected', 'selected')
                $select2.trigger('change')
            }
        }
    })

    $('.select2').select2()

    $('.treeview').each(function() {
        var shouldExpand = false
        $(this).find('li').each(function() {
            if ($(this).hasClass('active')) {
                shouldExpand = true
            }
        })
        if (shouldExpand) {
            $(this).addClass('active')
        }
    })

    $('a[data-widget^="pushmenu"]').click(function() {
        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        }, 350);
    })
})