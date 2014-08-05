var marvin_common = function () {
    return {
        init: function () {
            marvin_common.events();
        },

        events: function () {
            $(document).on('click', '.confirm', marvin_common.confirm);
        },

        confirm: function (e) {
            var ans = confirm("Do you really want to do this?");

            if (!ans) {
                e.preventDefault();
            }
        }
    };
}();

$(function () {
    marvin_common.init();
});
