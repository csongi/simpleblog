<div ng-controller="PostListCtrl">
    <h1>
        Posts
        <a class="btn btn-success pull-right" href="" ng-click="new()">
            <i class="fa fa-file-o" aria-hidden="true"></i> Add new post 
        </a>
    </h1>
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
                     <tr ng-repeat="post in posts">
                        <td>{{ post.id}}</td>
                        <td>{{ post.title}}</td>
                        <td>{{ post.user.name}}</td>
                        <td>{{ post.created_at}}</td>
                        <td>
                            <a href="" ng-click="edit(post.id)">
                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                            </a>
                        </td>
                        <td>
                        <span ng-if="post.deleted_at === null">
                            <a href="" ng-click="delete(post.id)">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                            </a>
                        </span>
                        <span ng-if="post.deleted_at !== null">
                            <a href="" ng-click="restore(post.id)">
                                <i class="fa fa-repeat" aria-hidden="true"></i> Restore
                            </a> 
                        </span>
                        </td>
                     </tr>
                 </tbody>
            </table>
        </div>   
    </div>
</div>