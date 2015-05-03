/**
 * Creates `rowspan` cells in a column when there are two or more cells in a
 * row with the same content, effectively grouping them together visually.
 *
 * **Note** - this plug-in currently only operates correctly with
 * **server-side processing**.
 *
 *  @name fnFakeRowspan
 *  @summary Create a rowspan for cells which share data
 *  @author Fredrik Wendel
 *
 *  @param {interger} iColumn Column index to have row span
 *  @param {boolean} [bCaseSensitive=true] If the data check should be case
 *    sensitive or not.
 *  @returns {jQuery} jQuery instance
 *
 *  @example
 *    $('#example').dataTable().fnFakeRowspan(3);
 */

// jQuery.fn.dataTableExt.oApi.fnFakeRowspan = function ( oSettings, iColumn, bCaseSensitive ) {
// 	/* Fail silently on missing/errorenous parameter data. */
// 	if (isNaN(iColumn)) {
// 		return false;
// 	}
//
// 	if (iColumn < 0 || iColumn > oSettings.aoColumns.length-1) {
// 		alert ('Invalid column number choosen, must be between 0 and ' + (oSettings.aoColumns.length-1));
// 		return false;
// 	}
//
// 	bCaseSensitive = (typeof(bCaseSensitive) != 'boolean' ? true : bCaseSensitive);
//
// 	function fakeRowspan () {
// 		var firstOccurance = null,
// 			value = null,
// 			rowspan = 0;
// 		jQuery.each(oSettings.aoData, function (i, oData) {
// 			var val = oData._aData[iColumn],
// 				cell = oData.nTr.childNodes[iColumn];
// 			/* Use lowercase comparison if not case-sensitive. */
// 			if (!bCaseSensitive) {
// 				val = val.toLowerCase();
// 			}
// 			/* Reset values on new cell data. */
// 			if (val != value) {
// 				value = val;
// 				firstOccurance = cell;
// 				rowspan = 0;
// 			}
//
// 			if (val == value) {
// 				rowspan++;
// 			}
//
// 			if (firstOccurance !== null && val == value && rowspan > 1) {
// 				oData.nTr.removeChild(cell);
// 				firstOccurance.rowSpan = rowspan;
// 			}
// 		});
// 	}
//
// 	oSettings.aoDrawCallback.push({ "fn": fakeRowspan, "sName": "fnFakeRowspan" });
//
// 	return this;
// };


$.fn.dataTableExt.oApi.fnFakeRowspan = function (oSettings) {
    _.each(oSettings.aoData, function(oData) {
      var cellsToRemove = [];
      for (var iColumn = 0; iColumn < oData.nTr.childNodes.length; iColumn++) {
        var cell = oData.nTr.childNodes[iColumn];
        var rowspan = $(cell).data('rowspan');
        var hide = $(cell).data('hide');

        if (hide) {
          cellsToRemove.push(cell);
        } else if (rowspan > 1) {
          cell.rowSpan = rowspan;
        }
      }
      // Remove the cells at the end, so you're not editing the current array
      _.each(cellsToRemove, function(cell) {
        oData.nTr.removeChild(cell);
      });
    });

    oSettings.aoDrawCallback.push({ "sName": "fnFakeRowspan" });

    return this;
};
