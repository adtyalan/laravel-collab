import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';
import { Line } from 'react-chartjs-2';
import {
    Chart as ChartJS,
    LineElement,
    PointElement,
    LinearScale,
    CategoryScale,
    Title,
    Tooltip,
    Legend
} from 'chart.js';

ChartJS.register(
    LineElement,
    PointElement,
    LinearScale,
    CategoryScale,
    Title,
    Tooltip,
    Legend
);

function App() {
    const [count, setCount] = useState(0);
    const [name, setName] = useState('');
    const [message, setMessage] = useState('');

    const increment = () => setCount(count + 1);
    const decrement = () => setCount(count - 1);

    const handleSubmit = (e) => {
        e.preventDefault();
        setMessage(`Hello, ${name}! Welcome to React!`);
    };

    const data = {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [
            {
                label: 'Sales in 2025',
                data: [30, 40, 35, 50, 70],
                borderColor: 'rgba(75,192,192,1)',
                backgroundColor: 'rgba(75,192,192,0.2)',
                tension: 0.3,
                fill: true,
            },
        ],
    };

    return (
        <div style={{ fontFamily: 'Arial', padding: '20px' }}>
            <h1>Hello from React!</h1>
            <h3>Counter Example</h3>
            <p style={{ fontSize: '20px' }}>Counter: {count}</p>
            <button onClick={decrement} style={{ fontSize: '20px', marginRight: '10px' }}>−</button>
            <button onClick={increment} style={{ fontSize: '20px' }}>+</button>

            {/* Form Section */}
            <form onSubmit={handleSubmit} style={{ marginTop: '20px' }}>
                <label>
                    Name:
                    <input
                        type="text"
                        value={name}
                        onChange={(e) => setName(e.target.value)}
                        style={{ marginLeft: '10px' }}
                    />
                </label>
                <button type="submit" style={{ marginLeft: '10px' }}>Submit</button>
            </form>

            {/* Message */}
            {message && <p style={{ marginTop: '10px', fontSize: '18px' }}>{message}</p>}

            {/* Chart Section */}
            <h3 style={{ marginTop: '30px' }}>Sales Data</h3>
            <div style={{ width: '100%', maxWidth: '500px', height: '300px' }}>
                <Line data={data} />
            </div>
        </div>
    );
}

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<App />);
