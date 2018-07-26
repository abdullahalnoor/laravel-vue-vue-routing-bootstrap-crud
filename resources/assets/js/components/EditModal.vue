<template>
  
 

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Modal title</h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                 <label for="">Name</label>
                 <input type="text" class="form-control" v-model="editRec.name">
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="updateData">Update</button>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
  props: ["editRec"],
  methods: {
    updateData() {
      axios
        .post("http://localhost/vlp-3/public/task/" + this.editRec.id, {
          name: this.editRec.name,
          id: this.editRec.id,
          _method: "PUT"
        })
        .then(data => {
          // console.log(data.data);
          this.$emit("recordUpdated", data);
          // this.tasks = response.data;
          // console.log(response.data);
        });
    }
  }
};
</script>
