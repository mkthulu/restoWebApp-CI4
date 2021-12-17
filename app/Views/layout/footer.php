</div class="text-black fw-bolder">
</div>
</body>

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- wow animation -->
<script src="/js/animate.js"></script>
<!-- select country -->
<script src="/js/bootstrap-select.js"></script>
<!-- owl carousel -->
<script src="/js/owl.carousel.js"></script>
<!-- chart js -->
<script src="/js/Chart.min.js"></script>
<script src="/js/Chart.bundle.min.js"></script>
<script src="js/utils.js"></script>
<script src="/js/analyser.js"></script>
<!-- nice scrollbar -->
<script src="/js/perfect-scrollbar.min.js"></script>
<script>
    var ps = new PerfectScrollbar("#sidebar");
</script>
<!-- custom js -->
<script src="/js/chart_custom_style1.js"></script>
<script src="/js/custom.js"></script>
</body>

</html>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img-preview')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    <?php if (isset($_SESSION['guestId'])) : ?>
        <?php if (
            $_SESSION['curPage'] == 'food_cards' ||
            $_SESSION['curPage'] == 'food_cards_detail' ||
            $_SESSION['curPage'] == 'finish'
        ) : ?>
            $(document).ready(function() {
                if ($(window).width() >= 1200)
                    $('#sidebar').addClass('active');
            });
        <?php endif; ?>
    <?php endif; ?>
</script>

</html>