@extends('layouts.app')

@section('content')
<div class="container">
    <a style="margin-left:100px" class="btn btn-danger" href="notes">Go back</a>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Notes</h3>
                    <div class="pull-right" onclick="showSort()" >
                        <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                            <i  class="glyphicon glyphicon-filter"></i>
                        </span>
                    </div>
                </div>
                <div class="panel-body" id="sortbuttons">
                    <input type="button"  onclick="sortTablebyName()" value="name">
                    <input type="button" onclick="sortTablebyDate()" value="date">
                    <input type="button"  onclick="sortTablebyCategory()" value="category">
                    <input type="button"  onclick="sortTablebyAuthor()" value="author">

                    <table class="table table-hover" id="dev-table">
                        <thead>
                            <tr>
                                <th>Note Name</th>
                                <th>Note</th>
                                <th>Note Category</th>
                                <th>Note Date</th>
                                <th>Note Author</th>
                                <th>Avatar</th>
                            </tr>
                        </thead>
                        <tbody>         
                            <?php foreach ($notes as $note): ?>
                                <?php if ($note->active != 1): ?>
                                    <tr>
                                        <td><?= $note->name; ?> </td>
                                        <td>
                                            <?= $note->text; ?></td>
                                        <td>
                                            <?= $note->category; ?></td>
                                        <td>
                                            <?= $note->updated_at; ?></td>
                                        <td>
                                            <?= $note->user["name"]; ?></td>
                                        <td>
                                            <img width="50" height="50" src="../uploads/<?= $note->user['file']; ?>" >
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
            $("#sortbuttons input").toggle();
        }
        function sortTablebyDate() {
            var rows = $('#dev-table tbody  tr').get();

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
                $('#dev-table').children('tbody').append(row);
            });
        }

        function sortTablebyCategory() {
            var rows = $('#dev-table tbody  tr').get();

            rows.sort(function (a, b) {

                var A = $(a).children('td').eq(2).text().toUpperCase();
                var B = $(b).children('td').eq(2).text().toUpperCase();

                if (A < B) {
                    return -1;
                }

                if (A > B) {
                    return 1;
                }

                return 0;

            });

            $.each(rows, function (index, row) {
                $('#dev-table').children('tbody').append(row);
            });
        }
        function sortTablebyAuthor() {
            var rows = $('#dev-table tbody  tr').get();

            rows.sort(function (a, b) {

                var A = $(a).children('td').eq(4).text().toUpperCase();
                var B = $(b).children('td').eq(4).text().toUpperCase();

                if (A < B) {
                    return -1;
                }

                if (A > B) {
                    return 1;
                }

                return 0;

            });

            $.each(rows, function (index, row) {
                $('#dev-table').children('tbody').append(row);
            });
        }
        function sortTablebyName() {
            var rows = $('#dev-table tbody  tr').get();

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
                $('#dev-table').children('tbody').append(row);
            });
        }

        $(document).ready(function () {
            $("#sortbuttons input").hide();



        });
    </script>

    @endsection
