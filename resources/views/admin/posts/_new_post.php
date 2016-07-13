<div id="new-post-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myNewModalLabel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
              <h4 class="modal-title" id="myNewModalLabel">New post</h4> 
          </div>
          <div class="modal-body">
              <form class="form" name="PostForm" ng-controller="PostFormCtrl" ng-submit="store()">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" required ng-model="post.title" id="title" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" required ng-model="post.content" id="content" placeholder="Content" cols="30" rows="10"></textarea> 
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <button class="btn btn-success pull-right" type="submit">Create</button>
                      </div>
                  </div>
              </form>
          </div>
        </div>
    </div>
</div>