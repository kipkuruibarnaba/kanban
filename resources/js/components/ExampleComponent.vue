<template>
    <div class="container container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card container-fluid">
                    <div class="card-header">Kanban Board</div>
                    <div class="row" id="column-movements">
                        <!-- <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Column</h5>
                                    <button
                                        type="button"
                                        id="btn-add-columns"
                                        class="btn btn-sm btn-danger"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <button
                        type="button"
                        id="btn-add-column"
                        class="btn btn-sm btn-info mt-2"
                    >
                        Add Column
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted () {
        console.log('Component mounted.')
    }
}
</script>
