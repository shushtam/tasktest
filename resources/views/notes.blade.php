@extends('layouts.app')

@section('content')
<div class="container">
    <hr>
    <a style="margin-left:100px" class="btn btn-danger" href="getall">See all notes</a>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Notes</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter" onclick="showSort()"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table" id="mytable">
                    <thead>
                        <tr class="filters">
                            <th><input type="button"  onclick="sortTablebyName()" value="name"></th>
                            <th><input type="button" onclick="sortTablebyDate()" value="date"></th>
                            <th><input type="button"  onclick="sortTablebyCategory()" value="category"></th>
                        </tr>
                        <tr>
                            <th>Note Name</th>       
                            <th>Note Category</th>
                            <th>Note</th>
                            <th>Note Date</th>
                            <th>Note Author</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($notes as $note): ?>
                            <tr>
                                <td><?= $note->name ?></td>
                                <td><?= $note->category ?></td>
                                <td><?= $note->text ?></td>
                                <td><?= $note->updated_at ?></td>
                                <td><?= $user->name ?></td>
                                <?= Form::open(array('url' => 'user/editnote', 'role' => 'form')) ?>
                                <?= csrf_field() ?>
                                <td>
                                    <input type="hidden" name="note_id" value="<?= $note->id ?>">
                                    <button type="submit>"><i class="fa fa-pencil" aria-hidden="true"></i> 
                                </td>

                                <?= Form::close() ?>
                                <?= Form::open(array('url' => 'user/deletenote', 'role' => 'form')) ?>
                                <?= csrf_field() ?>
                                <td><input type="hidden" name="note_id" value="<?= $note->id ?>"><button type="submit>"><i class="fa fa-trash" aria-hidden="true"></i> </td>

                                <?= Form::close() ?>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <div class="well">
                <h2>New Note--</h2>
                <?= Form::open(array('url' => 'user/addnote', 'class' => 'form-horizontal', 'role' => 'form', 'onsubmit' => 'return valideFunc()')) ?>
                <?= csrf_field() ?>
                <div class="form-group<?= $errors->has('name') ? ' has-error' : '' ?>">
                    <?= Form::label('name', 'name', ['class' => 'col-md-4 control-label']) ?>
                    <div class="col-md-6">
                        <?= Form::input('name', 'name', old('name'), ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) ?>
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
                        <?= Form::textarea('text', old('text'), ['class' => 'form-control', 'required' => 'required']) ?>
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
                <div class="form-group ">
                    <div class="col-md-6 col-md-offset-4">
                        <?= Form::label('active', 'Not show:') ?>

                        <?= Form::checkbox('active', '1') ?>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-md-6 col-md-offset-4">
                        <?= Form::input('submit', 'Add', 'add', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>

                <?= Form::close() ?>
            </div>
            <?= $notes->render(); ?>
        </div>

    </div>
</div>
@endsection
@section('js')
<script>

    function showSort() {
        sortTablebyDate();
        $("thead tr.filters").toggle();
    }
    function sortTablebyDate() {
        var rows = $('#mytable tbody  tr').get();

        rows.sort(function (a, b) {

            var A = $(a).children('td').eq(3).text().toUpperCase();
            var B = $(b).children('td').eq(3).text().toUpperCase();

            if (A < B) {
                return -1;
            }

            if (A > B) {
                return 1;
            }

            return 0;

        });

        $.each(rows, function (index, row) {
            $('#mytable').children('tbody').append(row);
        });
    }
    function sortTablebyName() {
        var rows = $('#mytable tbody  tr').get();

        rows.sort(function (a, b) {

            var A = $(a).children('td').eq(0).text().toUpperCase();
            var B = $(b).children('td').eq(0).text().toUpperCase();

            if (A < B) {
                return -1;
            }

            if (A > B) {
                return 1;
            }

            return 0;

        });

        $.each(rows, function (index, row) {
            $('#mytable').children('tbody').append(row);
        });
    }
    function sortTablebyCategory() {
        var rows = $('#mytable tbody  tr').get();

        rows.sort(function (a, b) {

            var A = $(a).children('td').eq(1).text().toUpperCase();
            var B = $(b).children('td').eq(1).text().toUpperCase();

            if (A < B) {
                return -1;
            }

            if (A > B) {
                return 1;
            }

            return 0;

        });

        $.each(rows, function (index, row) {
            $('#mytable').children('tbody').append(row);
        });
    }

    $(document).ready(function () {
        $("thead tr.filters").hide();



    });

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
