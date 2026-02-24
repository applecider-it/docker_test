import React from 'react'
import ReactDOM from 'react-dom/client'

function App() {
  return (
    <div className="p-6 text-xl text-red-600">
      React + Vite + Tailwind
    </div>
  )
}

ReactDOM.createRoot(
  document.getElementById('react')!
).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
)
