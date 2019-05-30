@if (session('success'))
<script>
    toastr.success(" {{session('success')}} ")
</script>
@endif
@if (session('error'))
<script>
    toastr.error(" {{session('error')}} ")
</script>
@endif

@if (session('info'))
<script>
    toastr.info(" {{session('info')}} ")
</script>
@endif

<script>
    $(".share-btn.facebook").on("click", function () {
        url = $(this).attr('aria-link');
        var fbpopup = window.open("https://www.facebook.com/sharer/sharer.php?u=" + url , "pop", "width=600, height=400, scrollbars=no");
        return false;
    });

    $(".share-btn.twitter").on("click", function () {
        url = $(this).attr('aria-link');
        var twpopup = window.open("http://www.twitter.com/share?url=" + url , "pop", "width=600, height=400, scrollbars=no");
        return false;
    });

    $(".share-btn.copy").on("click", function () {
        url = $(this).attr('aria-link');
        copyToClipboard(url);
        $(this).children("span.copy-text").text('Link Copied');
        return false;
    });

    function copyToClipboard(content) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(content).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>
