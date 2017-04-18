@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-7 ">

            <div class="panel panel-default">
                <div class="panel-heading">  <h4 >User Profile</h4></div>
                <div class="panel-body">

                    <div class="box box-info">

                        <div class="box-body">
                            <div class="col-sm-6">
                                <div  align="center"> <img alt="User Pic" src='/../../uploads/<?= $user->file ?>' id="profile-image1" class="img-circle img-responsive"> 

                                    <input id="profile-image-upload" class="hidden" type="file">
                                    <div style="color:#999;" >click here to change profile image</div>
                                    <!--Upload Image Js And Css-->

                                </div>

                                <br>

                                <!-- /input-group -->
                            </div>
                            <div class="col-sm-6">
                                <h4 style="color:#00b1b1;"><?= $user->name ?>  <?= $user->surname ?> </h4></span>
                                           
                            </div>
                            <div class="clearfix"></div>
                            <hr style="margin:5px 0 5px 0;">


                            <div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "><?= $user->name ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"> <?= $user->surname ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Age:</div><div class="col-sm-7"> <?= $user->age ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Phone</div><div class="col-sm-7"><?= $user->phone ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Address:</div><div class="col-sm-7"><?= $user->address ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"><?= $user->email ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>
                            <div class="col-sm-5 col-xs-6 tital " ><a href="edit" class="btn btn-success">edit</a></div><div class="col-sm-7"></div>
                             <div class="clearfix"></div>
                            <div class="bot-border"></div>
                            <div class="col-sm-5 col-xs-6 tital " ><a href="notes" class="btn btn-success">Notes</a></div><div class="col-sm-7"></div>

                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>
                </div> 
            </div>
        </div>  
        <script>
            
                $(document).ready(function () {

                    // jQuery methods go here...

                    $('#profile-image1').on('click', function () {
                        $('#profile-image-upload').click();

                    });

                });
        </script> 
    </div>
</div>
@endsection
