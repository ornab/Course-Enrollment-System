<div class="footer ">
    <div class="col-lg-4">
        developed by <strong>The Tricker</strong> .
    </div>
    <div>
        <strong>supervised by: </strong>The Tricker
    </div>
    <div>

    </div>
</div>

</div>
</div>

<!-- Mainly scripts -->
<script src="../js/jquery-2.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="../js/inspinia.js"></script>
<script src="../js/plugins/pace/pace.min.js"></script>



<script>
    $('#message').show().delay(2000).fadeOut();
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".profile_pic_input").change(function(){
        readURL(this);
    });

</script>
</body>

</html>


<!--<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2015
    </div>
</div>-->