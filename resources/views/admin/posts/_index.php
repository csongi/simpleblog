<div ng-app="Posts">
    <div ng-controller="PostListCtrl">
        <div class="row">
            <a href="" ng-click="new()">
                <i class="fa fa-file-o" aria-hidden="true"></i> Add new post 
            </a>
        </div>
        <div class="row">
             <table>
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
                             <a href="" ng-click="delete(post.id)">
                                 <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                             </a>
                         </td>
                     </tr>
                 </tbody>
             </table>   
         </div>
    </div>
</div>