<?php include_once('header.php');?>

<?php include_once('studentNavigation.php');?>

    <div id="page-wrapper" class="gray-bg">
<?php include_once('logoutrow.php');?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">

        </div>
        <div class="col-lg-2">

        </div>

    </div>
    <div class="container">
        <div class="col-lg-12">
            <h2>Hello Jon your Registered course list</h2>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <tr class="success">
                    <th>#</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Creadit</th>
                    <th>Trimester</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>CSE213</td>
                    <td>Optical Fiver</td>
                    <td>3</td>
                    <td>Summer</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>CSE213</td>
                    <td>Optical Fiver</td>
                    <td>3</td>
                    <td>Summer</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>CSE213</td>
                    <td>Optical Fiver</td>
                    <td>3</td>
                    <td>Summer</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


<?php include_once('footer.php');?>