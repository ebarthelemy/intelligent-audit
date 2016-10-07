# Intelligent Audit

Coding Assessment solution available here: http://67.205.135.204

## Tech Stack

Front End: JavaScript, jQuery, Vue.js 2.0
Back End: PHP, MySQL, Laravel 5.3

## Front End

Custom Component Approach:

Interesting Files:
- Vue Application: https://github.com/ebarthelemy/intelligent-audit/blob/master/resources/assets/js/app.js
- Report Component: https://github.com/ebarthelemy/intelligent-audit/blob/master/resources/assets/js/components/Report.vue

## Back End

API Approach:

API Endpoints:
- Report 1: http://67.205.135.204/api/invoices/1-1-2010/10-7-2016/
- Report 2: http://67.205.135.204/api/invoices/1-1-2010/10-7-2016/unmatched
- Report 3: http://67.205.135.204/api/trackings/1-1-2010/10-7-2016/unmatched

Interesting Files:
- Web Routes: https://github.com/ebarthelemy/intelligent-audit/blob/master/routes/web.php
- API Routes: https://github.com/ebarthelemy/intelligent-audit/blob/master/routes/api.php
- Invoices Controller: https://github.com/ebarthelemy/intelligent-audit/blob/master/app/Http/Controllers/InvoicesController.php
- Trackings Controller: https://github.com/ebarthelemy/intelligent-audit/blob/master/app/Http/Controllers/TrackingsController.php