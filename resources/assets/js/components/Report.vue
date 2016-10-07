<template>
    <div class="row">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Report {{ num }}</h1>
                <h2>
                    <span v-show="from">From {{ from }}</span>
                    <span v-show="to">to {{ to }}</span>
                </h2>
                <hr>

                <form class="form-inline">
                    <div class="form-group">
                        <label for="from">From</label>
                        <input v-model="from" type="text" class="form-control" id="from" placeholder="1/1/2010">
                    </div>
                    <div class="form-group">
                        <label for="to">to</label>
                        <input v-model="to" type="text" class="form-control" id="to" placeholder="10/7/2016">
                    </div>
                </form>
            </div>

            <div v-if="data" class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th v-for="field in data.fields">{{ field }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in data.list">
                            <th v-for="value in item">{{ value }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div v-if="data && (data.totalFields && data.totalList)" class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th v-for="totalField in data.totalFields">{{ totalField }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="totalItem in data.totalList">
                            <th v-for="totalValue in totalItem">{{ totalValue }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</template>

<script>
export default {
    props: ['num'],
    data () {
        return {
            from: null,
            to: null,
            loading: false,
            data: null,
            error: null
        }
    },
    created () {
        // fetch the data when the view is created and the data is
        // already being observed
        this.fetchData(this.num);
        console.log('Report ' + this.num);
    },
    watch: {
        // call again the method if the route changes
        num: function() {
            console.log(this.num);
            this.fetchData(this.num);
        },
        from: function() {
            this.fetchData(this.num);
        },
        to: function() {
            this.fetchData(this.num);
        }
    },
    methods: {
        fetchData (reportNum) {

            var re = new RegExp('^\\d{1,2}/\\d{1,2}/\\d{4}$');

            if (this.from !== null && re.test(this.from) && this.to !== null && re.test(this.to)) {
                var fromInput = this.from.replace(/\//g, '-');
                var toInput = this.to.replace(/\//g, '-');
                var endpoints = [];
                endpoints[1] = 'http://intelligent-audit.dev/api/invoices/' +  fromInput + '/' + toInput + '/';
                endpoints[2] = 'http://intelligent-audit.dev/api/invoices/' + fromInput + '/' + toInput + '/unmatched';
                endpoints[3] = 'http://intelligent-audit.dev/api/trackings/' + fromInput + '/' + toInput + '/unmatched';
                this.error = this.data = null;
                this.loading = true;
                $.get(endpoints[reportNum], function(data) {
                    this.loading = false;
                    this.error = false;
                    this.data = data;
                }
                .bind(this))
                .fail(function(err) {
                    this.error = err.toString();
                });
            }
        }
    }
}
</script>