
<script src="jquery.js"></script>



<style>
body { padding: 10px;}

.clonedInput { padding: 10px; border-radius: 5px; background-color: #def; margin-bottom: 10px; }

.clonedInput div { margin: 5px; }


</style>


<div id="clonedInput1" class="clonedInput">
    <div>
        <label for="txtCategory" class="">Learning category <span class="requiredField">*</span></label>
        <select class="" name="txtCategory[]" id="category1">
            <option value="">Please select</option>
        </select>
    </div>
    <div>
        <label for="txtSubCategory" class="">Sub-category <span class="requiredField">*</span></label>
        <select class="" name="txtSubCategory[]" id="subcategory1">
            <option value="">Please select category</option>
        </select>
    </div>
    <div>
        <label for="txtSubSubCategory">Sub-sub-category <span class="requiredField">*</span></label>
        <select name="txtSubSubCategory[]" id="subsubcategory1">
            <option value="">Please select sub-category</option>
        </select>
    </div>
    <div class="actions">
        <button class="clone">Clone</button> 
        <button class="remove">Remove</button>
    </div>
</div>
   
   
   
   
<script>

var regex = /^(.+?)(\d+)$/i;
var cloneIndex = $(".clonedInput").length;

function clone(){
    $(this).parents(".clonedInput").clone()
        .appendTo("body")
        .attr("id", "clonedInput" +  cloneIndex)
        .find("*")
        .each(function() {
            var id = this.id || "";
            var match = id.match(regex) || [];
            if (match.length == 3) {
                this.id = match[1] + (cloneIndex);
            }
        })
        .on('click', 'button.clone', clone)
        .on('click', 'button.remove', remove);
    cloneIndex++;
}
function remove(){
    $(this).parents(".clonedInput").remove();
}
$("button.clone").on("click", clone);

$("button.remove").on("click", remove);
</script>