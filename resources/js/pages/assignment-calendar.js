document.addEventListener('DOMContentLoaded', () => {
    const monthSelect = document.getElementById('month-select');
    if (!monthSelect) return;
    const yearSelect = document.getElementById('year-select');
    const container = document.getElementById('calendar-days');
    const today = container.dataset.today;

    function renderCalendar() {
        const month = Number(monthSelect.value);
        const year = Number(yearSelect.value);
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        container.replaceChildren();
        for (let blank = 0; blank < firstDay; blank++) {
            container.append(document.createElement('div'));
        }
        for (let day = 1; day <= daysInMonth; day++) {
            const cell = document.createElement('div');
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'm-px size-10 rounded-full hover:bg-orange-100';
            button.textContent = day;
            const date = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            if (date === today) {
                button.classList.add('bg-orange-500', 'text-white');
                button.setAttribute('aria-current', 'date');
            }
            cell.append(button);
            container.append(cell);
        }
    }

    function moveMonth(offset) {
        const date = new Date(Number(yearSelect.value), Number(monthSelect.value) + offset, 1);
        const year = String(date.getFullYear());
        if (![...yearSelect.options].some(option => option.value === year)) {
            yearSelect.add(new Option(year, year));
        }
        yearSelect.value = year;
        monthSelect.value = String(date.getMonth());
        renderCalendar();
    }
    document.getElementById('prev-month').addEventListener('click', () => moveMonth(-1));
    document.getElementById('next-month').addEventListener('click', () => moveMonth(1));
    monthSelect.addEventListener('change', renderCalendar);
    yearSelect.addEventListener('change', renderCalendar);
    renderCalendar();
});
