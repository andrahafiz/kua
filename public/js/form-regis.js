$(document).ready(function () {
    function toggleFields(isChecked, fields) {
        fields.forEach(function (field) {
            $(field).attr("disabled", isChecked);
        });
    }

    function setupFieldToggle(toggleId, fieldIds) {
        toggleFields($(toggleId).is(":checked"), fieldIds);
        $(toggleId).change(function () {
            toggleFields($(this).is(":checked"), fieldIds);
        });
    }

    const fatherHusbandFields = [
        "#citizen_father_husband",
        "#nationality_father_husband",
        "#nik_father_husband",
        "#no_passport_father_husband",
        "#location_birth_father_husband",
        "#date_birth_father_husband",
        "#religion_father_husband",
        "#job_father_husband",
        "#address_father_husband",
    ];

    const motherHusbandFields = [
        "#citizen_mother_husband",
        "#nationality_mother_husband",
        "#nik_mother_husband",
        "#no_passport_mother_husband",
        "#location_birth_mother_husband",
        "#date_birth_mother_husband",
        "#religion_mother_husband",
        "#job_mother_husband",
        "#address_mother_husband",
    ];

    const fatherWifeFields = [
        "#citizen_father_wife",
        "#nationality_father_wife",
        "#nik_father_wife",
        "#no_passport_father_wife",
        "#location_birth_father_wife",
        "#date_birth_father_wife",
        "#religion_father_wife",
        "#job_father_wife",
        "#address_father_wife",
    ];

    const motherWifeFields = [
        "#citizen_mother_wife",
        "#nationality_mother_wife",
        "#nik_mother_wife",
        "#no_passport_mother_wife",
        "#location_birth_mother_wife",
        "#date_birth_mother_wife",
        "#religion_mother_wife",
        "#job_mother_wife",
        "#address_mother_wife",
    ];

    setupFieldToggle("#is_unknown_father_husband", fatherHusbandFields);
    setupFieldToggle("#is_unknown_mother_husband", motherHusbandFields);
    setupFieldToggle("#is_unknown_father_wife", fatherWifeFields);
    setupFieldToggle("#is_unknown_mother_wife", motherWifeFields);

    function setupImagePreview(inputId, imgId) {
        $(inputId).change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(imgId).attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    }

    setupImagePreview("#imageHusband", "#showImageHusband");
    setupImagePreview("#imageWife", "#showImageWife");

    function calculateAge(birthDate) {
        var today = new Date();
        var birthDate = new Date(birthDate);
        var age = today.getFullYear() - birthDate.getFullYear();
        var monthDiff = today.getMonth() - birthDate.getMonth();

        if (
            monthDiff < 0 ||
            (monthDiff === 0 && today.getDate() < birthDate.getDate())
        ) {
            age--;
        }

        return age;
    }

    function setupAgeCalculation(inputId, outputId) {
        $(inputId).change(function () {
            var birthDate = $(this).val();
            var age = birthDate ? calculateAge(birthDate) : "";
            $(outputId).val(age);
        });
    }

    setupAgeCalculation("#date_birth_wife", "#old_wife");
    setupAgeCalculation("#date_birth_husband", "#old_husband");
});
