<div class="mostrar">
    <div class="mensaje color-blanco-transparente">

        <div class="informacion-paciente">
            <div class="historial-titulo">
                1. DATOS GENERALES

                <div class="historial-id">
                    HISTORIAL # <?php echo $row['Id_Historial'] ?>
                </div>
            </div>
            <div class="historial-info">
                <div class="historial-columna">
                    <div class="paciente-param">
                        NOMBRE
                    </div>

                </div>
                <div class="historial-columna historial-values">
                    <div class="paciente-value valueBox">
                        <?php echo $row['Nombre_Mascota'] ?>
                        <input type="hidden" id="idMascota" value="<?php echo $idMascota ?>">
                    </div>

                </div>
                <div class=" historial-columna">
                    <div class="paciente-param">
                        SEXO
                    </div>
                </div>
                <div class="historial-columna historial-values">
                    <div class="paciente-value valueBox">
                        <?php echo $row['Sexo_Mascota'] ?>
                    </div>
                </div>
                <div class="historial-columna">
                    <div class="paciente-param">
                        EDAD
                    </div>

                </div>
                <div class="historial-columna historial-values">
                    <div class="paciente-value valueBox">
                        <?php echo $row['Edad_Mascota'] ?>
                    </div>

                </div>
                <div class="historial-columna">
                    <div class="paciente-param">
                        ESPECIE
                    </div>
                </div>
                <div class="historial-columna historial-values">
                    <div class="paciente-value valueBox">
                        <?php echo $row['Tipo_Especie'] ?>
                    </div>
                </div>
                <div class="historial-columna">
                    <div class="paciente-param">
                        RAZA
                    </div>

                </div>
                <div class="historial-columna historial-values">
                    <div class="paciente-value valueBox">
                        <?php echo $row['Nombre_Raza'] ?>

                    </div>
                </div>
                <div class="historial-columna">
                    <div class="paciente-param">
                        DUEÑO
                    </div>
                </div>
                <div class="historial-columna historial-values">
                    <div class="paciente-value valueBox">
                        <?php echo $row['Nombre_Cliente'] ?>
                    </div>
                </div>

                <div class="historial-columna">
                    <div class="paciente-param">
                        #CITA
                    </div>
                </div>
                <div class="historial-columna historial-values">
                    <div class="paciente-value valueBox">
                        <?php echo $row['Id_Cita'] ?>
                    </div>
                </div>
                <div class="historial-columna">
                    <div class="paciente-param">
                        FECHA CITA
                    </div>
                </div>
                <div class="historial-columna historial-values">
                    <div class="paciente-value valueBox">
                        <?php echo $row['Fecha_Cita'] ?>
                        <input type="hidden" name="fechaCita" value="<?php echo $row['Fecha_Cita'] ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="resena-paciente">
            <div class="historial-titulo">
                2. RESENA DEL PACIENTE
            </div>
            <div class="historial-info">

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        CONDICION CORPORAL
                    </div>
                    <div class="paciente-value">

                        <input type="hidden" id="condicionCorporal" value="<?php echo $row['Id_ConcicionCorporal'] ?>">

                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="condicion" id="" value="1" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Muy Delgado</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="condicion" id="" value="2" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Delgado</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="condicion" id="" value="3" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Peso Ideal</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="condicion" id="" value="4" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Sobrepeso</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="condicion" id="" value="5" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Obesidad</span> <br>
                            </label>
                        </div>


                    </div>
                </div>

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        ESTADO REPRODUCTIVO
                    </div>
                    <div class="paciente-value">
                        <input type="hidden" id="estadoReproductivo" value="<?php echo $row['Id_EstadoReproductivo'] ?>">
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="estadoReproductivo" id="" value="1" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Normal</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="estadoReproductivo" id="" value="2" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Gestante</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="estadoReproductivo" id="" value="3" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Recien Parida</span> <br>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        OBSERVACIONES
                    </div>
                    <div class="historial-columna historial-values">
                        <textarea name="observacionEstado" id="motivo" cols="30" rows="5" spellcheck="false" class="textarea" disabled><?php echo $row['Observacion_EstadoReproductivo'] ?> </textarea>
                    </div>
                </div>

            </div>

        </div>

        <div class="anamnesis">
            <div class="historial-titulo">
                3.1 ANAMNESIS
            </div>
            <div class="historial-info">

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        ¿QUE TIPO DE ALIMENTOS CONSUME?
                    </div>
                    <div class="paciente-value">
                        <input type="hidden" id="tipoAlimento" value="<?php echo $row['Id_TipoAlimento'] ?>">
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="alimentacion" id="" value="1" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Pastoreo</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="alimentacion" id="" value="2" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Concentrado</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="alimentacion" id="" value="3" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Maiz/Sorgo</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="alimentacion" id="" value="4" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Pastoreo/Concentrado</span> <br>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        CONSUMO DE ALIMENTO
                    </div>
                    <div class="paciente-value">
                        <input type="hidden" id="consumoAlimento" value="<?php echo $row['Id_ConsumoAlimento'] ?>">

                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="consumo" id="" value="1" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Normal</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="consumo" id="" value="2" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Disminuido</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="consumo" id="" value="3" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">No Come</span> <br>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        OBSERVACIONES
                    </div>
                    <div class="historial-columna historial-values">

                        <textarea name="observacionAlimento" id="motivo" cols="30" rows="5" spellcheck="false" class="textarea" disabled><?php echo $row['Observacion_Alimentos'] ?></textarea>
                    </div>
                </div>

            </div>
        </div>

        <div class="anamnesis">
            <div class="historial-titulo">
                3.2 ANAMNESIS
            </div>
            <div class="historial-info">

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        COMPORTAMIENTO
                    </div>
                    <div class="paciente-value">
                        <input type="hidden" id="comportamiento" value="<?php echo $row['Id_Comportamiento'] ?>">

                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="comportamiento" id="" value="1" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Normal</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="comportamiento" id="" value="2" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Agresivo</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="comportamiento" id="" value="3" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Inquieto</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="comportamiento" id="" value="4" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Muestra Malestar</span> <br>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        ¿EL ANIMAL SE ENCUENTRA <br> DE PIE O POSTRADO?
                    </div>
                    <div class="paciente-value">
                        <input type="hidden" id="estadoAnimal" value="<?php echo $row['Id_EstadoAnimal'] ?>">

                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="postrado" id="" value="1" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">De Pie</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="postrado" id="" value="2" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Postrado</span> <br>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        SI ESTA DE PIE... ¿COMO <br> CAMINA?
                    </div>
                    <div class="paciente-value">
                        <div class="historial-value">
                            <input type="hidden" id="estadoCaminar" value="<?php echo $row['Id_EstadoCaminar'] ?>">

                            <label class="custom-radio">
                                <input type="radio" name="comoCamina" id="" value="1" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Renuente</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="comoCamina" id="" value="2" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Vacilante</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="comoCamina" id="" value="3" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Claudicante</span> <br>
                            </label>
                        </div>

                    </div>
                </div>

            </div>
            <div class="historial-info">

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        PIEL Y PELAJE
                    </div>
                    <div class="paciente-value">
                        <input type="hidden" id="pelaje" value="<?php echo $row['Id_Pelaje'] ?>">

                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="pelaje" id="" value="1" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Normal</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="pelaje" id="" value="2" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Hirsuto</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="pelaje" id="" value="3" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Abultamiento/Hinchazones</span> <br>
                            </label>
                        </div>
                        <div class="historial-value">
                            <label class="custom-radio">
                                <input type="radio" name="pelaje" id="" value="4" disabled>
                                <span class="radio-button">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="valueBox">Heridas</span> <br>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="historial-columna historial-values">
                    <div class="paciente-param">
                        ALTERACIONES FUNCIONALES
                    </div>
                    <div class="col-alteraciones-principal">
                        <div class="main-col-alteraciones">
                            <div class="col-alteraciones">
                                <div class="paciente-param2">
                                    TEMPERATURA
                                </div>
                                <div class="paciente-value valueBox">
                                    <?php echo $row['Temperatura'] ?> °C
                                </div>
                            </div>
                            <div class="col-alteraciones">
                                <div class="paciente-param2">
                                    PULSO
                                </div>
                                <div class="paciente-value valueBox">
                                    <?php echo $row['Pulso'] ?>/min
                                </div>

                            </div>
                        </div>

                        <div class="main-col-alteraciones">


                            <div class="col-alteraciones">
                                <div class="paciente-param2">
                                    TIMPANIZADO
                                </div>
                                <div class="paciente-value valueBox">
                                    <?php echo $row['Timpanizado'] ?>
                                </div>

                            </div>

                            <div class="col-alteraciones">
                                <div class="paciente-param2">
                                    ATONIA
                                </div>
                                <div class="paciente-value valueBox">
                                    <?php echo $row['Atonia'] ?>
                                </div>

                            </div>

                        </div>
                    </div>


                </div>



            </div>
        </div>



        <div class="anamnesis">
            <div class="historial-titulo">
                4. MUCOSAS
            </div>
            <div class="mucosa-info">

                <table>
                    <thead>
                        <th>MUCOSAS</th>
                        <th>NORMAL (ROSASEA)</th>
                        <th>ICTERICAS (AMARILLAS)</th>
                        <th>HIPEREMIA (ROJAS)</th>
                        <th>CIANOTICA (ROJAS)</th>
                        <th>PALIDAS (BLANCAS)</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>OCULAR</td>
                            <input type="hidden" id="mucosaOcular" value="<?php echo $row['Mucosa_Ocular'] ?>">

                            <td><label class="custom-radio">
                                    <input type="radio" name="ocular" id="" value="1" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="ocular" id="" value="2" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="ocular" id="" value="3" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="ocular" id="" value="4" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="ocular" id="" value="5" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                        </tr>
                        <tr>
                            <td>BUCAL</td>
                            <input type="hidden" id="mucosaBucal" value="<?php echo $row['Mucosa_Bucal'] ?>">

                            <td><label class="custom-radio">
                                    <input type="radio" name="bucal" id="" value="1" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="bucal" id="" value="2" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="bucal" id="" value="3" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="bucal" id="" value="4" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="bucal" id="" value="5" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                        </tr>
                        <tr>
                            <td>NASAL</td>

                            <input type="hidden" id="mucosaNasal" value="<?php echo $row['Mucosa_Nasal'] ?>">

                            <td><label class="custom-radio">
                                    <input type="radio" name="nasal" id="" value="1" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="nasal" id="" value="2" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="nasal" id="" value="3" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="nasal" id="" value="4" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                            <td><label class="custom-radio">
                                    <input type="radio" name="nasal" id="" value="5" disabled>
                                    <span class="radio-button">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </label></td>
                        </tr>
                    </tbody>
                </table>


            </div>

        </div>

        <div class="anamnesis">
            <div class="historial-titulo">
                5. COMENTARIOS
            </div>

            <textarea class="historial-comentario" spellcheck="false" name="comentarioPrincipal" disabled><?php echo $row['Comentarios'] ?></textarea>



        </div>

    </div>
</div>