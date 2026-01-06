import React from 'react'
import ReactDOM from 'react-dom/client'

function App() {
  return (
    <div className="p-6 text-xl text-blue-600">
      React + Vite + Tailwind
    </div>
  )
}

ReactDOM.createRoot(
  document.getElementById('app')!
).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
)
