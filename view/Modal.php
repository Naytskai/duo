<?php if (isset($_SESSION['errorForm']) && $_SESSION['errorForm'] != "") { ?>
    <!-- Error's Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $_SESSION['errorContext']; ?></h4>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($_SESSION['errorForm'])) {
                        echo $_SESSION['errorForm'];
                        $_SESSION['errorForm'] = "";
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- --------------- -->
<?php } ?>

<!-- Lane's Modal -->
<div class="modal fade" id="laneModal" style="margin-top: 15%;" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLaneLabel"></h4>
            </div>
            <div class="modal-body centeredText">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="radio" name="mateslane" id="option1" value="Top">Top
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="mateslane" id="option2" value="Mid">Mid
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="mateslane" id="option3" value="Jungle">Jungle
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="mateslane" id="option4" value="ADC">ADC
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="mateslane" id="option5" value="Support">Support
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="requestAjaxSetLane()" class="btn btn-primary" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- --------------- -->