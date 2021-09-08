<template>
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <span class="input-group-text" id="size">Size</span>
                <input type="number" v-model="size" class="form-control" placeholder="250" aria-label="Size" aria-describedby="size">
            </div>

            <button v-on:click="addPackage()" type="button" class="btn btn-primary float-right">Add</button>
        </div>
    </div>
</template>

<script>
    import Package from '../classes/Package';

    export default {
        mounted() {
        },
        props: {
            size: null,
        },
        methods: {
            addPackage() {
                if (this.size > 0)
                {
                    var newPackage = new Package({ size: this.size });
                    this.$parent.packages.push(newPackage);
                    newPackage.save();
                } else {
                    alert('Please enter a size for the package.');
                }
            }
        },
    }
</script>
