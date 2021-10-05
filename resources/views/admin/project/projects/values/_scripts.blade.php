@section($javaScriptSectionName)
    <script>
        function getSelectForm(variants, defaultValue, required = false) {
            let form =
                "<label for=\"value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                "<select id=\"value\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\" name=\"value\"" + (required ? " required>\n" : ">\n") +
                "   <option value=\"\"></option>\n";

            $.each(variants, function (key, value) {
                form += "<option value=" + value;

                if (value === defaultValue) {
                    form += ' selected';
                }

                form += '>' + value + '</option>\n';
            })

            form += '</select>';

            return form;
        }

        function getFloatForm(defaultValue, required = false, isRange = false) {
            return getNumberForm(defaultValue, true, required, isRange);
        }

        function getIntegerForm(defaultValue, required = false, isRange = false) {
            return getNumberForm(defaultValue, false, required, isRange);
        }

        function getNumberForm(defaultValue, isFloat = false, required = false, isRange = false) {
            let form = '';
            if (!isRange) {
                form +=
                    "<label for=\"value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                    "<input id=\"value\" type=\"number\" " + isFloat ? "step=\"0.01\"" : "" + " class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\"\n" +
                    "   name=\"value\" value=\"" + defaultValue + "\"";

                form += required ? " required>" : ">";
            } else {
                form +=
                    "<div class=\"col-md-2\">" +
                    "   <label for=\"value_from\" class=\"col-form-label\">{{ trans('adminlte.value.from') }}</label>\n" +
                    "   <input id=\"value_from\" type=\"number\" " + isFloat ? "step=\"0.01\"" : "" + " class=\"form-control{{ $errors->has('value_from') ? ' is-invalid' : '' }}\"\n" +
                    "       name=\"value_from\" value=\"" + defaultValue + "\"";

                form += required ? " required>" : ">";
                form += "</div>";

                form +=
                    "<div class=\"col-md-2\">" +
                    "   <label for=\"value_to\" class=\"col-form-label\">{{ trans('adminlte.value.from') }}</label>\n" +
                    "   <input id=\"value_to\" type=\"number\" " + isFloat ? "step=\"0.01\"" : "" + " class=\"form-control{{ $errors->has('value_to') ? ' is-invalid' : '' }}\"\n" +
                    "       name=\"value_to\" value=\"" + defaultValue + "\"";

                form += required ? " required>" : ">";
                form += "</div>";
            }

            return form;
        }

        function getStringForm(defaultValue, required = false) {
            let form =
                "<label for=\"value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                "<input id=\"value\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\"\n" +
                "   name=\"value\" value=\"" + defaultValue + "\"";

            form += required ? " required>" : ">";

            return form;
        }

        $('#characteristic_id').select2();
        let main_forms = $('#main-forms');
        let submit_button = $('#submit-button');
        console.log({{ old('characteristic_id') }});
        $(document).ready(function () {
            $('#characteristic_id').change(function () {
                let characteristicValue = $(this).val();
                $.ajax({
                    url: "/api/characteristics/" + characteristicValue,
                    type: "get",
                    dataType: 'json',
                    success: function(data) {
                        data = data.data;
                        submit_button.hide();
                        main_forms.empty();

                        let form = "";

                        let defaultValue = "{{ old('value', $value ? $value->value : null) }}";
                        defaultValue = defaultValue === "" ? defaultValue : data.default;

                        if (data.variants !== null) {
                            form += getSelectForm(data.variants, defaultValue, data.required);
                        } else if (data.type === '{{ \App\Entity\Project\Characteristic::TYPE_FLOAT }}') {
                            form += getFloatForm(defaultValue, data.required, data.is_range);
                        } else if (data.type === '{{ \App\Entity\Project\Characteristic::TYPE_INTEGER }}') {
                            form += getIntegerForm(defaultValue, data.required, data.is_range);
                        } else {
                            form = getStringForm(defaultValue, data.required);
                        }

                        form +=
                            "@if ($errors->has('value'))\n" +
                            "   <span class=\"invalid-feedback\"><strong>{{ $errors->first('value') }}</strong></span>\n" +
                            "@endif";

                        main_forms.attr('class', '');
                        !data.is_range ? main_forms.addClass('col-md-4') : null;
                        main_forms.append(form);

                        submit_button.show();
                    },
                    error: function (error) {
                    }
                });
            });
        });

    </script>
@endsection
