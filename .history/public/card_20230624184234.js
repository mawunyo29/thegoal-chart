function cardVariants() {
    return Object.entries(theme('colors')).flatMap(([color, values]) => {
      if (color === 'transparent' || color === 'current') {
        return []
      }
      return Object.entries(values).map(([weight, hex]) => {
        return {
          [`.card-${color}-${weight}`]: {
            '--tw-shadow': `0 25px 50px -12px ${hex}`,
            '--tw-ring-shadow': `0 25px 50px -12px ${hex}`,
          },
        }
      })
    })
  }
cardVariants()

