$(function(){

    $('a[href*=#]').click(function() {

        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
            && location.hostname == this.hostname) {

            var $target = $(this.hash);

            $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

            if ($target.length) {

                var targetOffset = $target.offset().top-200;

                $('html,body').animate({scrollTop: targetOffset}, 1000);

                if (document.body.classList.contains('hamburgler-active')) {
                    closeNav();
                } else {
                    openNav();
                }

                return false;
            }

        }
    });

});

document.getElementById('hamburgler').addEventListener('click', checkNav);
window.addEventListener("keyup", function(e) {
    if (e.keyCode == 27) closeNav();
}, false);

function checkNav() {
    if (document.body.classList.contains('hamburgler-active')) {
        closeNav();
    } else {
        openNav();
    }
}

function closeNav() {
    document.body.classList.remove('hamburgler-active');
}

function openNav() {
    document.body.classList.add('hamburgler-active');
}