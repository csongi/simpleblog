<div id="edit-post-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myEditModalLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
              <h4 class="modal-title" id="myEditModalLabel">Edit post</h4> 
          </div>
          <div class="modal-body">
              <form class="form" name="PostForm" ng-controller="PostFormCtrl" ng-submit="update(post.id)">
                  <div class="form-group">
                      <label for="title">ID</label>
                      <input type="text" class="form-control" disabled="disabled" readonly="readonly" ng-model="post.id">
                  </div>
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" ng-model="post.title" id="title" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" ng-model="post.content" id="content" placeholder="Content">
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <button class="btn btn-success pull-right" type="submit">Save</button>
                      </div>
                  </div>
              </form>
          </div>
        </div>
    </div>
</div>