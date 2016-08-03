$ '[data-rule-required=true]'
    .prev 'label'
    .append '<small> *</small>'

$ ':checkbox, :radio'
    .iCheck
        checkboxClass: 'icheckbox_square-blue'
        radioClass: 'iradio_square-blue'
        increaseArea: '20%'

$ "select:not('.not-select2')"
    .select2()

moment.locale 

$ ".moment"
    .each () ->
        moment($(this).data('date')).fromNow()

$.validator.setDefaults

    errorPlacement: (place, element) ->
        form = element.parents 'form'

        if form.hasClass 'form-horizontal'
            errorWrapper = element.parent()
            place.appendTo errorWrapper
        else
            formgroup = element.parents '.form-group'
            place.appendTo formgroup

        return

    showErrors: (errorMap, errorList) ->
        this.errorList = ( {message: '<i class="fa fa-times-circle-o"></i> ' + error.message, element: error.element} for error in this.errorList )

        this.defaultShowErrors()

        return

    highlight: (element, errorClass, validClass) ->
        formgroup = $ element
                        .parents '.form-group'

        $ formgroup
            .addClass 'has-error'

        return

    unhighlight: (element, errorClass, validClass) ->
        formgroup = $ element
                        .parents '.form-group'

        $ formgroup
            .removeClass 'has-error'

        return

moment.locale document.documentElement.lang

$ 'form'
    .each () ->
        $ this
            .validate()

$ document
    .ajaxError (event, jqXHR, settings, thrownError) ->
        switch jqXHR.status
            when 404 
                swal('404', "Resources not found!", "error")
                break
            when 401 
                ### Maybe login form popup ###
                swal('401', "You're not authenticated!", "error")
                break
            when 403
                swal('403', "You're not allowed to access this resource!", "error")
                break
            when 405
                swal('405', "Http method not allowed!", "error")
                break
            when 500
                swal('500', "Something went wrong!", "error")
                break
            when 503
                swal('503', "Application is under maintenance!", "error")
                break
        return
    .ajaxStart () ->
        Pace.restart()



$ document
    .on 'click', '.btn-delete', () ->
        $ 'form', this
            .trigger 'submit'

$ document
    .on 'ajax.form.beforeSend', '.btn-delete form.ajax', () ->
        $ this
            .parents '.btn-delete'
            .addClass 'disabled', true

$ document
    .on 'ajax.form.complete', '.btn-delete form.ajax', () ->
        $ this
            .parents '.btn-delete'
            .removeClass 'disabled'

$ document
    .on 'submit', 'form.ajax', (evt) ->
        data = $(this).serialize()
        url = $(this).prop("action")
        method = $(this).prop("method")
        that = this
        $that = $(this)

        $.ajax
            url: url,
            method: method
            data: data

            beforeSend: (jqXHR, settings) ->
                $that.trigger "ajax.form.beforeSend" , [jqXHR, settings]

                return

            error: (jqXHR, textStatus, errorThrown) -> 
                $that.trigger "ajax.form.error" , [jqXHR, textStatus, errorThrown]

                return

            success: (data, textStatus, jqXHR) ->
                $that.trigger "ajax.form.success" , [data, textStatus, jqXHR]

                return

            complete: (jqXHR, textStatus) ->
                $that.trigger "ajax.form.complete" , [jqXHR, textStatus]

                return


        false

$ document
    .on 'click', 'form.ajax.undoable [type="submit"]', (evt) ->
        that = this

        swal
            title: "Are you sure"
            text: "This action is not undoable!",
            type: "warning"
            showCancelButton: true
        ,
            (isConfirm) ->
                if isConfirm
                    $ that
                        .parents 'form'
                            .submit()


        false

$ document
    .on 'ajax.form.beforeSend', 'form.ajax', (evt) ->
        $ this
            .siblings '.overlay'
            .removeClass 'hide'

$ document
    .on 'ajax.form.error', 'form.ajax', (evt, jqXHR, textStatus, errorThrown) ->
        switch jqXHR.status
            when 422
                ### add server errors message to form ###
                undefinedFields = ""
                fields = jqXHR.responseJSON
                for field, messages of fields

                    $field = $ this 
                                .find("input[name='#{field}']")

                    if $field.length > 0
                        $parent = $field.parent()
                    
                        $parent.addClass("has-error")

                        $ "<label id=\"#{field}-error\" class=\"error\" for=\"#{field}\"><i class=\"fa fa-times-circle-o\"></i> #{messages[0]}</label>"
                            .appendTo $parent

                    else 
                        if undefinedFields.length
                            undefinedFields = undefinedFields + "\n" + messages[0]
                        else
                            undefinedFields = messages[0]

                $ '.has-error input, select, textarea', this
                    .first()
                    .focus()

                if undefinedFields.length > 0
                    $.notify
                        message: undefinedFields
                    ,
                        type: 'error'
                        placement:
                            align: 'center'

$ document
    .on 'ajax.form.beforeSend', 'form.ajax', (evt) ->
        $ 'button[data-loading-text]', this
            .button 'loading'

$ document
    .on 'ajax.form.complete', 'form.ajax', (evt) ->
        $ this
            .siblings '.overlay'
            .addClass 'hide'

        $ 'button[data-loading-text]', this
            .button 'reset'

$ document
    .on 'ajax.form.success', "form.ajax:not('.no-reset')", (evt, data, textStatus, jqXHR) ->
        $(this)[0]
            .reset()

$ document
    .on 'ajax.form.success', "form.ajax", (evt, data, textStatus, jqXHR) ->
        $.notify
                message: data.message
            ,
                type: 'success'
                placement:
                    align: 'center'

$ document
    .on 'ajax.form.success', '.modal form.ajax', (evt, data, textStatus, jqXHR) ->
        $ this
            .parents '.modal'
            .modal 'hide'


$ document
    .on 'ifToggled', ':checkbox', () ->
        $ this
          .change()

$ ".flash-notify"
    .each () ->
        $that = $(this)

        $.notify
            message: $that.data "message"
        ,
            type: $that.data "type"
            placement:
                align: 'center'