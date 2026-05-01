<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800">Control de Calificaciones</h1>
    <p class="text-slate-500 mt-1">Supervise la satisfacción de los pacientes con el servicio médico.</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col">
        <div class="text-sm font-medium text-slate-500 mb-2">Total Calificaciones</div>
        <div class="text-3xl font-bold text-slate-800 mb-1"><?php echo $stats['total']; ?></div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col">
        <div class="text-sm font-medium text-slate-500 mb-2">Promedio General</div>
        <div class="text-3xl font-bold text-amber-500 mb-1 flex items-center gap-2">
            <?php echo $stats['promedio']; ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" /></svg>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col">
        <div class="text-sm font-medium text-slate-500 mb-2">Excelentes (4-5★)</div>
        <div class="text-3xl font-bold text-emerald-600 mb-1"><?php echo $stats['excelentes']; ?></div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex flex-col">
        <div class="text-sm font-medium text-slate-500 mb-2">Áreas de Mejora (1-2★)</div>
        <div class="text-3xl font-bold text-red-600 mb-1"><?php echo $stats['malas']; ?></div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100 text-sm text-slate-500">
                    <th class="p-4 font-medium">Fecha</th>
                    <th class="p-4 font-medium">Paciente</th>
                    <th class="p-4 font-medium">Doctor</th>
                    <th class="p-4 font-medium">Puntuación</th>
                    <th class="p-4 font-medium">Comentario</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                <?php foreach($calificaciones as $cal): ?>
                    <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors">
                        <td class="p-4 text-slate-500 whitespace-nowrap">
                            <?php echo date('d/m/Y', strtotime($cal['fecha_calificacion'])); ?>
                        </td>
                        <td class="p-4 font-medium text-slate-800">
                            <?php echo htmlspecialchars($cal['paciente_nombre']); ?>
                        </td>
                        <td class="p-4">
                            <div class="font-medium text-slate-800">Dr. <?php echo htmlspecialchars($cal['medico_nombre']); ?></div>
                            <div class="text-xs text-slate-500"><?php echo htmlspecialchars($cal['nombre_especialidad']); ?></div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center gap-0.5 text-amber-500">
                                <?php for($i=1; $i<=5; $i++): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 <?php echo $i <= $cal['puntuacion'] ? 'text-amber-500' : 'text-slate-200'; ?>"><path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" /></svg>
                                <?php endfor; ?>
                            </div>
                        </td>
                        <td class="p-4 text-slate-600 italic">
                            <?php echo !empty($cal['comentario']) ? '"' . htmlspecialchars($cal['comentario']) . '"' : '<span class="text-slate-400 not-italic">Sin comentario</span>'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($calificaciones)): ?>
                    <tr>
                        <td colspan="5" class="p-8 text-center text-slate-500">Aún no hay calificaciones registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
