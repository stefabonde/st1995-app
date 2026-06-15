$(document).ready(function () {
    let $project = $('#app_bundle_time_spent_type_project');

    // $project.select2();

    $project.change(function (e) {
        if ($project.is("select")) {
            // ... retrieve the corresponding form.
            var $form = $(this).closest('form');
            // Simulate form data, but only include the selected city value.
            var data = {};
            data[$(this).attr('name')] = $(this).val();
            // Submit data via AJAX to the form's action path.
            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: data,
                success: function (html) {
                    // Replace current position field ...
                    $('#app_bundle_time_spent_type_task').replaceWith(
                        // ... with the returned one from the AJAX response.
                        $(html).find('#app_bundle_time_spent_type_task')
                    );
                    // Position field now displays the appropriate zipCode.
                    if ($('#app_bundle_time_spent_type_task').is('select') === false) {
                        $('#app_bundle_time_spent_type_task').prop('disabled', true);
                    }
                }
            });
        }
    });
});