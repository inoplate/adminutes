(function() {
  $('[data-rule-required=true]').prev('label').append('<small> *</small>');

  $(':checkbox, :radio').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%'
  });

  $("select").select2();

  moment.locale;

  $(".moment").each(function() {
    return moment($(this).data('date')).fromNow();
  });

  $.validator.setDefaults({
    errorPlacement: function(place, element) {
      var errorWrapper, form, formgroup;
      form = element.parents('form');
      if (form.hasClass('form-horizontal')) {
        errorWrapper = element.parent();
        place.appendTo(errorWrapper);
      } else {
        formgroup = element.parents('.form-group');
        place.appendTo(formgroup);
      }
    },
    showErrors: function(errorMap, errorList) {
      var error;
      this.errorList = (function() {
        var i, len, ref, results;
        ref = this.errorList;
        results = [];
        for (i = 0, len = ref.length; i < len; i++) {
          error = ref[i];
          results.push({
            message: '<i class="fa fa-times-circle-o"></i> ' + error.message,
            element: error.element
          });
        }
        return results;
      }).call(this);
      this.defaultShowErrors();
    },
    highlight: function(element, errorClass, validClass) {
      var formgroup;
      formgroup = $(element).parents('.form-group');
      $(formgroup).addClass('has-error');
    },
    unhighlight: function(element, errorClass, validClass) {
      var formgroup;
      formgroup = $(element).parents('.form-group');
      $(formgroup).removeClass('has-error');
    }
  });

  moment.locale(document.documentElement.lang);

  $('form').each(function() {
    return $(this).validate();
  });

  $(document).ajaxError(function(event, jqXHR, settings, thrownError) {
    switch (jqXHR.status) {
      case 404:
        swal('404', "Resources not found!", "error");
        break;
      case 401:

        /* Maybe login form popup */
        swal('401', "You're not authenticated!", "error");
        break;
      case 403:
        swal('403', "You're not allowed to access this resource!", "error");
        break;
      case 405:
        swal('405', "Http method not allowed!", "error");
        break;
      case 500:
        swal('500', "Something went wrong!", "error");
        break;
      case 503:
        swal('503', "Application is under maintenance!", "error");
        break;
    }
  }).ajaxStart(function() {
    return Pace.restart();
  });

  $(document).on('click', '.btn-delete', function() {
    return $('form', this).trigger('submit');
  });

  $(document).on('ajax.form.beforeSend', '.btn-delete form.ajax', function() {
    return $(this).parents('.btn-delete').addClass('disabled', true);
  });

  $(document).on('ajax.form.complete', '.btn-delete form.ajax', function() {
    return $(this).parents('.btn-delete').removeClass('disabled');
  });

  $(document).on('submit', 'form.ajax', function(evt) {
    var $that, data, method, that, url;
    data = $(this).serialize();
    url = $(this).prop("action");
    method = $(this).prop("method");
    that = this;
    $that = $(this);
    $.ajax({
      url: url,
      method: method,
      data: data,
      beforeSend: function(jqXHR, settings) {
        $that.trigger("ajax.form.beforeSend", [jqXHR, settings]);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        $that.trigger("ajax.form.error", [jqXHR, textStatus, errorThrown]);
      },
      success: function(data, textStatus, jqXHR) {
        $that.trigger("ajax.form.success", [data, textStatus, jqXHR]);
      },
      complete: function(jqXHR, textStatus) {
        $that.trigger("ajax.form.complete", [jqXHR, textStatus]);
      }
    });
    return false;
  });

  $(document).on('click', 'form.ajax.undoable [type="submit"]', function(evt) {
    var that;
    that = this;
    swal({
      title: "Are you sure",
      text: "This action is not undoable!",
      type: "warning",
      showCancelButton: true
    }, function(isConfirm) {
      if (isConfirm) {
        return $(that).parents('form').submit();
      }
    });
    return false;
  });

  $(document).on('ajax.form.beforeSend', 'form.ajax', function(evt) {
    return $(this).siblings('.overlay').removeClass('hide');
  });

  $(document).on('ajax.form.error', 'form.ajax', function(evt, jqXHR, textStatus, errorThrown) {
    var $field, $parent, field, fields, messages, undefinedFields;
    switch (jqXHR.status) {
      case 422:

        /* add server errors message to form */
        undefinedFields = "";
        fields = jqXHR.responseJSON;
        for (field in fields) {
          messages = fields[field];
          $field = $(this).find("input[name='" + field + "']");
          if ($field.length > 0) {
            $parent = $field.parent();
            $parent.addClass("has-error");
            $("<label id=\"" + field + "-error\" class=\"error\" for=\"" + field + "\"><i class=\"fa fa-times-circle-o\"></i> " + messages[0] + "</label>").appendTo($parent);
          } else {
            if (undefinedFields.length) {
              undefinedFields = undefinedFields + "\n" + messages[0];
            } else {
              undefinedFields = messages[0];
            }
          }
        }
        $('.has-error input, select, textarea', this).first().focus();
        if (undefinedFields.length > 0) {
          return $.notify({
            message: undefinedFields
          }, {
            type: 'error',
            placement: {
              align: 'center'
            }
          });
        }
    }
  });

  $(document).on('ajax.form.beforeSend', 'form.ajax', function(evt) {
    return $('button[data-loading-text]', this).button('loading');
  });

  $(document).on('ajax.form.complete', 'form.ajax', function(evt) {
    $(this).siblings('.overlay').addClass('hide');
    return $('button[data-loading-text]', this).button('reset');
  });

  $(document).on('ajax.form.success', 'form.ajax', function(evt, data, textStatus, jqXHR) {
    return $.notify({
      message: data.message
    }, {
      type: 'success',
      placement: {
        align: 'center'
      }
    });
  });

  $(document).on('ifToggled', ':checkbox', function() {
    return $(this).change();
  });

  $(".flash-notify").each(function() {
    var $that;
    $that = $(this);
    return $.notify({
      message: $that.data("message")
    }, {
      type: $that.data("type"),
      placement: {
        align: 'center'
      }
    });
  });

}).call(this);

//# sourceMappingURL=adminutes.js.map
