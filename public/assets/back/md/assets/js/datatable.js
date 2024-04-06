if ($("#order-listing").length) {
  var extensions = {
    sFilter: "dataTables_filter mdc-filter",
    sLength: "dataTables_length mdc-sort-filter"
  };
  // Used when bJQueryUI is false
  $.extend($.fn.dataTableExt.oStdClasses, extensions);
  $.extend($.fn.dataTableExt.oJUIClasses, extensions);
  $("#order-listing").dataTable({
    paginate: true,
    pageLength: 10,
    lengthMenu: [
      [5, 10, -1],
      [5, 10, "Show all"]
    ]
  });
}
if ($("#order-table").length) {
  var extensions = {
    sFilter: "dataTables_filter mdc-filter",
    sLength: "dataTables_length mdc-sort-filter"
  };
  // Used when bJQueryUI is false
  $.extend($.fn.dataTableExt.oStdClasses, extensions);
  $.extend($.fn.dataTableExt.oJUIClasses, extensions);
  $("#order-table").dataTable({
    paginate: true,
    pageLength: 10,
    lengthMenu: [
      [5, 10, -1],
      [5, 10, "Show all"]
    ]
  });
}