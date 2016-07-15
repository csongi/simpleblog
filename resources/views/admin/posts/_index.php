<div ng-controller="PostListCtrl">
    <h1>
        Posts
        <?php if (Auth::user()->can('create-post')): ?> 
        <a class="btn btn-success pull-right" href="" ng-click="new()">
            <i class="fa fa-file-o" aria-hidden="true"></i> Add new post 
        </a>
        <?php endif ?>
    </h1>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <input class="form-control" type="text" ng-model="searchText" placeholder="Search"/>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                 <thead>
                     <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Author</td>
                        <td>Date of creation</td>
                        <td></td>
                        <td></td>
                     </tr>
                 </thead>
                 <tbody>
                     <tr ng-repeat="post in posts | filter:searchText">
                        <td>{{ post.id}}</td>
                        <td>{{ post.title}}</td>
                        <td>{{ post.user.name}}</td>
                        <td>{{ post.created_at}}</td>
                        <td>

                        <?php if (Auth::user()->can('edit-post')): ?> 
                        <span ng-if="post.deleted_at === null">
                            <a href="" ng-click="edit(post.id)">
                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                            </a>
                        </span>
                        <?php elseif (Auth::user()->can('view-post')): ?>
                        <span ng-if="post.deleted_at === null">
                            <a href="" ng-click="show(post.id)">
                                <i class="fa fa-eye" aria-hidden="true"></i> View
                            </a>
                        </span>
                        <?php endif ?>

                        <?php if (Auth::user()->can('restore-post')): ?> 
                        <span ng-if="post.deleted_at !== null">
                            <a href="" ng-click="restore(post.id)">
                                <i class="fa fa-repeat" aria-hidden="true"></i> Restore
                            </a>
                        </span>
                        <?php endif ?>
                        </td>
                        <td>

                        <?php if (Auth::user()->can('trash-post')): ?> 
                        <span ng-if="post.deleted_at === null">
                            <a href="" ng-click="trash(post.id)">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Trash
                            </a>
                        </span>
                        <?php endif ?>

                        <?php if (Auth::user()->can('delete-post')): ?> 
                        <span ng-if="post.deleted_at !== null">
                            <a href="" ng-click="delete(post.id)">
                                <i class="fa fa-remove" aria-hidden="true"></i> Delete
                            </a>
                        </span>
                        <?php endif ?>
                        </td>
                     </tr>
                 </tbody>
            </table>
        </div>   
    </div>
</div>