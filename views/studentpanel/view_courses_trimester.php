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

        <div class="col-lg-12 col-md-12">
            <h2>Your Running semester "Summer 2016" </h2>
        </div>
        <div class="col-lg-12 col-md-12">
            <h2> All CSE Trimester List </h2>

            <!-- Modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Trimester 1</h4>
                        </div>
                        <div class="modal-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course ID</th>
                                    <th>Course Name</th>
                                    <th>Creadit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>CSE213</td>
                                    <td>Optical Fiver</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>CSE213</td>
                                    <td>Optical Fiver</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>CSE213</td>
                                    <td>Optical Fiver</td>
                                    <td>3</td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>





            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal1">
                    Trimester 1
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
                    Trimester 2
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal3">
                    Trimester 3
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal4">
                    Trimester 4
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal5">
                    Trimester 5
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal6">
                    Trimester 6
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal7">
                    Trimester 7
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal8">
                    Trimester 8
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal9">
                    Trimester 9
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal10">
                    Trimester 10
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal11">
                    Trimester 11
                </button>
            </div>
            <div class="trimesterbutton">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal12">
                    Trimester 12
                </button>
            </div>


        </div>
    </div>


<?php include_once('footer.php');?>