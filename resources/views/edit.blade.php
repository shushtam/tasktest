@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">

                    <?= Form::open(array('url' => 'user/edit', 'class' => 'form-horizontal', 'role' => 'form','files'=>true,'onsubmit' => 'return valideFunc()')) ?>
                    <?= csrf_field() ?>

                    <div class="form-group<?= $errors->has('name') ? ' has-error' : '' ?>">
                        <?= Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('name', 'name', Auth::user()->name, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) ?>
                            <span id="nameerror"></span>
                            <?php if ($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('name') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group<?= $errors->has('surname') ? ' has-error' : '' ?>">
                        <?= Form::label('surname', 'Surname', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('surname', 'surname', Auth::user()->surname, ['class' => 'form-control', 'required' => 'required']) ?>
                            <span id="surnameerror"></span>
                            <?php if ($errors->has('surname')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('surname') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                      <div class="form-group<?= $errors->has('age') ? ' has-error' : '' ?>">
                        <?= Form::label('age', 'Age', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('number', 'age', Auth::user()->age, ['class' => 'form-control', 'required' => 'required','min'=>'0','max'=>'100']) ?>
                            <?php if ($errors->has('age')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('age') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group<?= $errors->has('phone') ? ' has-error' : '' ?>">
                        <?= Form::label('phone', 'Phone', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('phone', 'phone', Auth::user()->phone, ['class' => 'form-control', 'required' => 'required']) ?>
                            <?php if ($errors->has('phone')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('phone') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group<?= $errors->has('address') ? ' has-error' : '' ?>">
                        <?= Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('address', 'address', Auth::user()->address, ['class' => 'form-control', 'required' => 'required']) ?>
                            <?php if ($errors->has('address')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('address') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?= $errors->has('email') ? ' has-error' : '' ?>">
                        <?= Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('email', 'email',Auth::user()->email, ['class' => 'form-control', 'required' => 'required']) ?>
                            <?php if ($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('email') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
   

          

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <?= Form::input('submit', 'Change', 'Change', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                    <?= Form::close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function valideFunc() {
        var valid = false;
        if ($("#name").val().length < 4)
        {
            vname = false;
            $("#nameerror").text("Name must be at least 4 characters");
        } else {
            vname = true;
            $("#nameerror").text("");
        }
        if ($("#surname").val().length < 4)
        {
            vsurname = false;
            $("#surnameerror").text("Surname must be at least 4 characters");
        } else
        {
            vsurname = true;
            $("#surnameerror").text("");
        }
        if (vname == true && vsurname == true) {
            valid = true;
        }
        if (valid == true) {
            return true;
        } else {

            return false;
        }
    }
</script>
@endsection
