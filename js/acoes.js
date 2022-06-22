   /// toggle ///
    $(function() {
    $(".toggle").on("click", function() {
        if ($(".item").hasClass("active")) {
            $(".item").removeClass("active");
        } else {
            $(".item").addClass("active");
        }
    });
});

/// Clareandro ///

 (function(storeName) {
                var b = document.createElement('script'); b.type = 'text/javascript'; b.async = true;
                b.src = 'https://www.magazinevoce.com.br/js/banner.js?store='+ storeName;
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(b, s);
                })('clareandro');