<div class="modal fade" id="delete-cart-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo BASEURL?>helper/routing.php" method="POST">
          <div class="modal-footer">
          <input type="hidden" name="product_id" id="recordId2">
              <button class="btn btn-success" type="submit" name="delete_cart">Yes</button>
              <button class="btn btn-primary" type="button" data-dismiss="modal">No</button>
          </div>
        </form>
      </div>
    </div>
</div>