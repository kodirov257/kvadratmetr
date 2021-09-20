@section($javaScriptSectionName)
    <script>
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

                        let defaultValue = "{{ $value ? $value->value : old('value') }}";
                        defaultValue = defaultValue === "" ? defaultValue : data.default;

                        if (data.variants !== null) {
                            form +=
                                "<label for=value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                "<select id=\"value\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\" name=\"value\">\n" +
                                "   <option value=\"\"></option>\n";

                            $.each(data.variants, function (key, value) {
                                form += "<option value=" + value;

                                if (value === defaultValue) {
                                    form += ' selected';
                                }

                                form += '>' + value + '</option>\n';
                            })

                            form += '</select>';
                        } else if (data.type === '{{ \App\Entity\Shop\Characteristic::TYPE_FLOAT }}') {
                            form +=
                                "<label for=value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                "<input id=\"value\" type=\"number\" step=\"0.01\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\"\n" +
                                "name=\"value\" value=\"{{ old('value', $value ? $value->value : null)}}\"";

                            if (data.required) {
                                form += " required>";
                            }
                        } else if (data.type === '{{ \App\Entity\Shop\Characteristic::TYPE_INTEGER }}') {
                            form +=
                                "<label for=value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                "<input id=\"value\" type=\"number\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\"\n" +
                                "name=\"value\" value=\"{{ old('value', $value ? $value->value : null)}}\"";

                            if (data.required) {
                                form += " required>";
                            }
                        } else {
                            form +=
                                "<label for=value\" class=\"col-form-label\">{{ trans('adminlte.value.name') }}</label>\n" +
                                "<input id=\"value\" class=\"form-control{{ $errors->has('value') ? ' is-invalid' : '' }}\"\n" +
                                "   name=\"value\" value=\"{{ old('value', $value ? $value->value : null)}}\"";

                            if (data.required) {
                                form += " required>";
                            }
                        }

                        form +=
                            "@if ($errors->has('value'))\n" +
                            "   <span class=\"invalid-feedback\"><strong>{{ $errors->first('value') }}</strong></span>\n" +
                            "@endif";
                        main_forms.append(
                            form
                        );

                        submit_button.show();
                    },
                    error: function (error) {
                    }
                });
            });
        });

    </script>
@endsection
