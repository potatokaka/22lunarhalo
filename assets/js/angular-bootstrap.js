define([
  'require',
  'angular',
  'angular-config'
],
function(require, angular) {
  'use strict';
  angular.element(document).ready(function () {
    angular.bootstrap(document, ['cloudgate']);
  });
});