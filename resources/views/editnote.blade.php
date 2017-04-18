@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Note</div>
                <div class="panel-body">
                    <?= Form::open(array('url' => 'user/posteditnote', 'class' => 'form-horizontal', 'role' => 'form', 'onsubmit' => 'return valideFunc()')) ?>
                    <?= csrf_field() ?>
                    <div class="form-group<?= $errors->has('name') ? ' has-error' : '' ?>">
                        <?= Form::label('name', 'name', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::input('hidden', 'id', $note->id, ['class' => 'form-control']) ?>
                            <?= Form::input('name', 'name', $note->name, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) ?>
                            <?php if ($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('name') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group<?= $errors->has('text') ? ' has-error' : '' ?>">
                        <?= Form::label('text', 'text', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6">
                            <?= Form::textarea('text', $note->text, ['class' => 'form-control', 'required' => 'required']) ?>
                            <span id="texterror"></span>
                            <?php if ($errors->has('text')): ?>
                                <span class="help-block">
                                    <strong><?= $errors->first('text') ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <?= Form::label('category', 'Category:', ['class' => 'col-md-4 control-label']) ?>
                        <div class="col-md-6 col-md-offset-4">

                            <?= Form::select('category', ['art' => 'art', 'music' => 'music', 'politics' => 'politics'], 'art', ['class' => 'form-control', 'style' => 'margin-bottom:80px']) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4" >

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
        if ($("#text").val().length > 500)
        {
            vname = false;
            $("#texterror").text("Text is too big");
        } else {
            vname = true;
            $("#texterror").text("");
        }

        if (vname == true) {
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
