


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Avalie o Quiosque</h4>
      </div>
      <form action="confirma_avalicao.php" method="POST">
        <div class="modal-body">
          <div class="estrela">
            <p>Qualidade da comida :</p>
            <input type="radio" name="estrela" id="vazio" value="" checked/>
            
            <label for="estrala1"><i class="fa "></i></label>
            <input type="radio" name="estrela" id="estrala1" value="1"/>
            
            <label for="estrala2"><i class="fa "></i></label>
            <input type="radio" name="estrela" id="estrala2" value="2"/>
            
            <label for="estrala3"><i class="fa "></i></label>
            <input type="radio" name="estrela" id="estrala3" value="3"/>
            
            <label for="estrala4"><i class="fa "></i></label>
            <input type="radio" name="estrela" id="estrala4" value="4"/>
          
            <label for="estrala5"><i class="fa "></i></label>
            <input type="radio" name="estrela" id="estrala5" value="5"/>
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>

  </div>
</div>
