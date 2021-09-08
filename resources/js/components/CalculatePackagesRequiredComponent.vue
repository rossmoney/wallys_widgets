<template>
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <span class="input-group-text" id="order_size">Order Size</span>
                <input type="number" v-model="order_size" class="form-control" placeholder="251" aria-label="Order Size" aria-describedby="order_size">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="result">Result</span>
                <textarea v-model="result" disabled readonly class="form-control"></textarea>
            </div>

            <button v-on:click="calculate()" type="button" class="btn btn-primary float-right">Calculate Packages</button>
        </div>
    </div>
</template>

<script>
    import Package from '../classes/Package';

    export default {
        mounted() {
        },
        props: {
            order_size: null,
            result: null,
        },
        methods: {
            calculate() {
                if (this.order_size > 0)
                {
                    //add algorithm
                } else {
                    alert('Please enter an order size.');
                }
            }
        },
    }
</script>
