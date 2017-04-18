@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                    <?= Form::open(array('url' => 'user/register', 'class' => 'form-horizontal', 'role' => 'form', 'files' => true, 'onsubmit' => 'return valideFunc()')) ?>
                    <?= csrf_field() ?>

                    <div class="form-group<?= $errors->has('name') ? ' has-error' : '' ?>">
                        <?= Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('name', 'name', old('name'), ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) ?>
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
                            <?= Form::input('surname', 'surname', old('surname'), ['class' => 'form-control', 'required' => 'required']) ?>
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
                            <?= Form::input('number', 'age', old('age'), ['class' => 'form-control', 'required' => 'required', 'min' => '0', 'max' => '100']) ?>
                            <span id="ageerror"></span>
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
                            <?= Form::input('phone', 'phone', old('phone'), ['class' => 'form-control', 'required' => 'required']) ?>
                            <span id="phoneerror"></span>
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
                            <?= Form::input('address', 'address', old('address'), ['class' => 'form-control', 'required' => 'required']) ?>
                            <span id="addresserror"></span>
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
                            <?= Form::input('email', 'email', old('email'), ['class' => 'form-control', 'required' => 'required']) ?>
                            <span id="emailerror"></span>
                            <?php if ($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('email') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group<?= $errors->has('image') ? ' has-error' : '' ?>">
                        <?= Form::label('image', 'Avatar', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('file', 'image', old('image'), ['class' => 'form-control', 'required' => 'required']) ?>
                            <span id="imageerror"></span>
                            <?php if ($errors->has('image')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('image') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?= $errors->has('password') ? ' has-error' : '' ?>">
                        <?= Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('password', 'password', Null, ['class' => 'form-control', 'required' => 'required']) ?>
                            <span id="passworderror"></span>
                            <?php if ($errors->has('password')) : ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('password') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= Form::label('password-confirm', 'Confirm Password', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('password', 'password_confirmation', Null, ['id' => 'password-confirm', 'class' => 'form-control', 'required' => 'required']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <?= Form::input('submit', 'Register', 'Register', ['class' => 'btn btn-primary']) ?>
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
        if ($("#password").val().length < 6)
        {
            vpassword = false;
            $("#passworderror").text("Password must be at least 6 characters");
        } else
        {
            vpassword = true;
            $("#passworderror").text("");
        }
        if (vname == true && vsurname == true && vpassword == true) {
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
