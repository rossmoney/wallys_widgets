<template>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Size</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for='apackage in $parent.packages' v-bind:key="apackage.id">
                <td class="p-2">
                    <span>{{ apackage.size }}</span>
                </td>
                <td><button v-on:click="deletePackage(apackage.id)" type="button" class="btn btn-danger float-right">x</button></td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        mounted() {
        },
        methods: {
            deletePackage(id) {
                let apackage = this.$parent.packages.find(apackage => apackage.id === id);
                apackage.delete();

                let filteredPackages = this.$parent.packages.filter(element => element !== apackage)
                this.$parent.packages = filteredPackages;
            }
        },
    }
</script>
